<?php

declare(strict_types=1);

namespace App\Contracts;

interface Storage
{
    public function store(string $filename, string $path, string $content): bool;
}
