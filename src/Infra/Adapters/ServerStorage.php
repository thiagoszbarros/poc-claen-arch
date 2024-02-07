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
        $workingDir = $_ENV['PWD'];
        $fullPath = "$workingDir/storage/$path";

        if (! file_exists($fullPath)) {
            mkdir($fullPath, 0777);
        }

        return boolval(file_put_contents("$fullPath/$filename.pdf", $content));
    }
}
