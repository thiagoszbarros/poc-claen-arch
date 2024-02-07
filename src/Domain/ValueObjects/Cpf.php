<?php

declare(strict_types=1);

namespace App\Domain\ValueObjects;

final class Cpf
{
    private readonly string $cpf;

    public function __construct(
        string $cpf
    ) {
        if ($this->validate($cpf) === false) {
            throw new \DomainException('Invalid cpf.');
        }

        $this->cpf = $cpf;
    }

    private function validate($cpf): bool
    {
        $cpf = preg_replace('/[^0-9]/is', '', $cpf);

        if (strlen($cpf) != 11) {
            return false;
        }

        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }

        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }

        return true;
    }

    public function __toString(): string
    {
        return $this->cpf;
    }
}
