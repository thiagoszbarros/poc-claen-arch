<?php

declare(strict_types=1);

use App\Application\Contracts\ExportRegistrationPdfExporter;
use App\Application\Contracts\Storage;
use App\Application\UseCases\ExportRegistration\Dtos\ExportRegistrationInput;
use App\Application\UseCases\ExportRegistration\Dtos\ExportRegistratonOutput;
use App\Application\UseCases\ExportRegistration\ExportRegistration;
use App\Domain\Entities\Registration;
use App\Domain\Repositories\LoadRegistration;
use App\Domain\ValueObjects\Cpf;
use App\Domain\ValueObjects\Email;

test('Export Registration Use Case', function (): void {
    $registration = Registration::reset()
        ->setName('Thiago Barros')
        ->setEmail(new Email('thiagobarros@95gmail.com'))
        ->setRegistrationNumber(new Cpf('06806573398'))
        ->setBirthDate(new DateTimeImmutable('1995-09-27'))
        ->setRegistratedAt(new DateTimeImmutable());

    $repository = Mockery::mock(LoadRegistration::class);
    $repository
        ->shouldReceive('loadByRegistrationNumber')
        ->andReturn($registration);

    $pdfExporter = Mockery::mock(ExportRegistrationPdfExporter::class);
    $pdfExporter
        ->shouldReceive('export');

    $storage = Mockery::mock(Storage::class);
    $storage
        ->shouldReceive('store');

    $exportRegistrationUseCase = new ExportRegistration(
        repository: $repository,
        pdfExporter: $pdfExporter,
        storage: $storage
    );

    $output = $exportRegistrationUseCase->execute(
        new ExportRegistrationInput(
            registrationNumber: '06806573398',
            fileName: 'xpto',
            path: 'registrations'
        )
    );

    expect($output)->toBeInstanceOf(ExportRegistratonOutput::class);
    expect($output->getFullFilename())
        ->toBeString()
        ->toBe('registrations/xpto.pdf');
});
