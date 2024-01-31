<?php

namespace App\UseCases\ExportRegistration\Dtos;

class ExportRegistrationInput
{
    public function __construct(private string $registrationNumber)
    {
    }

    /**
     * Get the value of cpf
     */
    public function getRegistrationNumber(): string
    {
        return $this->registrationNumber;
    }
}
