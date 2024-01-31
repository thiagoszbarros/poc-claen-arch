<?php

declare(strict_types=1);

namespace App\UseCases\ExportRegistration;

use App\Contracts\ExportRegistrationPdfExporter;
use App\Contracts\Storage;
use App\Domain\ValueObjects\Cpf;
use App\Domain\Repositories\LoadRegistration;
use App\UseCases\ExportRegistration\Dtos\ExportRegistrationInput;
use App\UseCases\ExportRegistration\Dtos\ExportRegistratonOutput;

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
            fullFilename: $input->getPath() . DIRECTORY_SEPARATOR . $input->getFileName() . '.pdf'
        );
    }
}
