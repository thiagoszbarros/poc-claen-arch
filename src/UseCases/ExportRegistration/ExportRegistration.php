<?php

declare(strict_types=1);

namespace App\UseCases\ExportRegistration;

use App\Domain\Repositories\LoadRegistration;
use App\Domain\ValueObjects\Cpf;
use App\UseCases\ExportRegistration\Dtos\ExportRegistrationInput;
use App\UseCases\ExportRegistration\Dtos\ExportRegistratonOutput;

final class ExportRegistration
{
    public function __construct(private LoadRegistration $repository)
    {
    }

    public function execute(ExportRegistrationInput $input): ExportRegistratonOutput
    {
        $registrationNumber = new Cpf($input->getRegistrationNumber());
        $registration = $this->repository->loadByRegistrationNumber($registrationNumber);

        return new ExportRegistratonOutput([
            'name' => $registration->getName(),
            'email' => strval($registration->getEmail()),
            'registrationNumber' => strval($registration->getRegistrationNumber()),
            'birthDate' => $registration->getBirthDate()->format(\DateTime::ISO8601),
            'registratedAt' => $registration->getRegistratedAt()->format(\DateTime::ISO8601),
        ]);
    }
}
