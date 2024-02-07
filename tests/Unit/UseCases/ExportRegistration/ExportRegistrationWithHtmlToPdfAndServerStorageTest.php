<?php

use App\Application\UseCases\ExportRegistration\Dtos\ExportRegistrationInput;
use App\Application\UseCases\ExportRegistration\Dtos\ExportRegistratonOutput;
use App\Application\UseCases\ExportRegistration\ExportRegistration;
use App\Domain\Entities\Registration;
use App\Domain\ValueObjects\Cpf;
use App\Infra\Adapters\HtmlToPdf;
use App\Infra\Adapters\ServerStorage;
use App\Infra\Repositories\Stunt\StuntLoadRegistration;
use ThiagoBarros\FileCounter\Counter;

test('Export registration using HtmlToPdf and ServerStorage', function (): void {

    $registration = Registration::reset()
        ->setRegistrationNumber(new Cpf('06806573398'));
    $repo = new StuntLoadRegistration();
    $pdfExporter = new HtmlToPdf();
    $storage = new ServerStorage();
    $exportRegistrationUseCase = new ExportRegistration($repo, $pdfExporter, $storage);
    $workingDir = $_ENV['PWD'];
    $input = new ExportRegistrationInput($registration->getRegistrationNumber(), 'test', 'tests');

    $result = $exportRegistrationUseCase->execute($input);

    expect($result)->toBeInstanceOf(ExportRegistratonOutput::class);
    expect($result->getFullFilename())->toBe('tests/test.pdf');
    expect(Counter::number_of_files("$workingDir/storage/tests", 'pdf'))->toBe(1);

    unlink("$workingDir/storage/tests/test.pdf");
    rmdir("$workingDir/storage/tests");
});
