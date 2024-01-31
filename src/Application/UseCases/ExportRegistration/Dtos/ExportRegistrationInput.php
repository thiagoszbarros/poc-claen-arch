<?php

declare(strict_types=1);

namespace App\Application\UseCases\ExportRegistration\Dtos;

readonly class ExportRegistrationInput
{
    public function __construct(
        private string $registrationNumber,
        private string $fileName,
        private string $path
    ) {
    }

    /**
     * Get the value of cpf
     */
    public function getRegistrationNumber(): string
    {
        return $this->registrationNumber;
    }

    /**
     * Get the value of fileName
     */
    public function getFileName(): string
    {
        return $this->fileName;
    }

    /**
     * Get the value of path
     */
    public function getPath(): string
    {
        return $this->path;
    }
}
