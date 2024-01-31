<?php

namespace App\UseCases\ExportRegistration\Dtos;

class ExportRegistratonOutput
{
    private string $name;
    private string $email;
    private string $registrationNumber;
    private string $birthDate;
    private string $registratedAt;

    public function __construct(array $values)
    {
        $this->name = $values['name'] ?? '';
        $this->email = $values['email'] ?? '';
        $this->registrationNumber = $values['registrationNumber'] ?? '';
        $this->birthDate = $values['birthDate'] ?? '';
        $this->registratedAt = $values['registratedAt'] ?? '';
    }

    /**
     * Get the value of name
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Get the value of email
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Get the value of registrationNumber
     */
    public function getRegistrationNumber(): string
    {
        return $this->registrationNumber;
    }

    /**
     * Get the value of birthDate
     */
    public function getBirthDate(): string
    {
        return $this->birthDate;
    }

    /**
     * Get the value of registratedAt
     */
    public function getRegistratedAt(): string
    {
        return $this->registratedAt;
    }
}
