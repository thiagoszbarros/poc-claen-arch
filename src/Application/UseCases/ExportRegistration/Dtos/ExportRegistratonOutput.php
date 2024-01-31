<?php

declare(strict_types=1);

namespace App\Application\UseCases\ExportRegistration\Dtos;

readonly class ExportRegistratonOutput
{
    public function __construct(
        private string $fullFilename
    ) {
    }

    /**
     * Get the value of fullFilename
     */
    public function getFullFilename(): string
    {
        return $this->fullFilename;
    }
}
