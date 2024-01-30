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

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(Email $email): void
    {
        $this->email = $email;
    }

    public function getRegistrationNumber(): string
    {
        return $this->registrationNumber;
    }

    public function setRegistrationNumber(Cpf $registrationNumber): void
    {
        $this->registrationNumber = $registrationNumber;
    }

    public function getBirthDate(): DateTimeInterface
    {
        return $this->birthDate;
    }

    public function setBirthDate(DateTimeInterface $birthDate): void
    {
        $this->birthDate = $birthDate;
    }

    public function getRegistratedAt(): DateTimeInterface
    {
        return $this->registratedAt;
    }

    public function setRegistratedAt(DateTimeInterface $registratedAt): void
    {
        $this->registratedAt = $registratedAt;
    }
}
