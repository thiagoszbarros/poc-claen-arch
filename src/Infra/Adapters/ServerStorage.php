<?php

declare(strict_types=1);

namespace App\Infra\Adapters;

use App\Application\Contracts\Storage;

final class ServerStorage implements Storage
{
    public function store(
        string $filename,
        string $path,
        string $content
    ): bool {
        return boolval(file_put_contents("$path/$filename.pdf", $content));
    }
}
