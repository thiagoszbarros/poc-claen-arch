<?php

declare(strict_types=1);

namespace App\Infra\Repositories\Stunt;

use DateTimeImmutable;
use App\Domain\ValueObjects\Cpf;
use App\Domain\ValueObjects\Email;
use App\Domain\Entities\Registration;
use App\Domain\Repositories\LoadRegistration;

class StuntLoadRegistration implements LoadRegistration
{
    public function loadByRegistrationNumber(Cpf $registrationNumber): Registration
    {
        return Registration::reset()
            ->setName('Thiago Barros')
            ->setEmail(new Email('thiagobarros@95gmail.com'))
            ->setRegistrationNumber(new Cpf('06806573398'))
            ->setBirthDate(new DateTimeImmutable('1995-09-27'))
            ->setRegistratedAt(new DateTimeImmutable());
    }
}
