<?php

declare(strict_types=1);

namespace App\Domain\Entities;

use App\Domain\ValueObjects\Cpf;
use App\Domain\ValueObjects\Email;
use DateTimeInterface;

final class Registration
{
    private string $name;

    private Email $email;

    private Cpf $registrationNumber;

    private DateTimeInterface $birthDate;

    private DateTimeInterface $registratedAt;

    private function __construct()
    {
    }

    /**
     * Reset class instance
     *
     * @return self
     */
    public static function reset(): static
    {
        return new Registration();
    }

    /**
     * Get the value of registratedAt
     */
    public function getRegistratedAt(): DateTimeInterface
    {
        return $this->registratedAt;
    }

    /**
     * Set the value of registratedAt
     *
     * @return self
     */
    public function setRegistratedAt(DateTimeInterface $registratedAt): static
    {
        $this->registratedAt = $registratedAt;

        return $this;
    }

    /**
     * Get the value of birthDate
     */
    public function getBirthDate(): DateTimeInterface
    {
        return $this->birthDate;
    }

    /**
     * Set the value of birthDate
     *
     * @return self
     */
    public function setBirthDate(DateTimeInterface $birthDate): static
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    /**
     * Get the value of registrationNumber
     */
    public function getRegistrationNumber(): Cpf
    {
        return $this->registrationNumber;
    }

    /**
     * Set the value of registrationNumber
     *
     * @return self
     */
    public function setRegistrationNumber(Cpf $registrationNumber): static
    {
        $this->registrationNumber = $registrationNumber;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail(): Email
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return self
     */
    public function setEmail(Email $email): static
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of name
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return self
     */
    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Build class instance
     *
     * @return self
     */
    public function build(): static
    {
        return $this;
    }
}
