<?php

declare(strict_types=1);

namespace App\Application\UseCases\ExportRegistration;

use App\Application\Contracts\ExportRegistrationPdfExporter;
use App\Application\Contracts\Storage;
use App\Application\UseCases\ExportRegistration\Dtos\ExportRegistrationInput;
use App\Application\UseCases\ExportRegistration\Dtos\ExportRegistratonOutput;
use App\Domain\Repositories\LoadRegistration;
use App\Domain\ValueObjects\Cpf;

final readonly class ExportRegistration
{
    public function __construct(
        private LoadRegistration $repository,
        private ExportRegistrationPdfExporter $pdfExporter,
        private Storage $storage,
    ) {
    }

    public function execute(ExportRegistrationInput $input): ExportRegistratonOutput
    {
        $registration = $this->repository->loadByRegistrationNumber(
            registrationNumber: new Cpf(
                cpf: $input->getRegistrationNumber()
            )
        );

        $fileContent = $this->pdfExporter->export(registration: $registration);

        $this->storage->store(
            filename: $input->getFileName(),
            path: $input->getPath(),
            content: $fileContent
        );

        return new ExportRegistratonOutput(
            fullFilename: $input->getPath().DIRECTORY_SEPARATOR.$input->getFileName().'.pdf'
        );
    }
}
