<?php

declare(strict_types=1);

namespace App\Infra\Presentation;

use App\Infra\Http\Controllers\Presentation;

class ExportRegistrationPresenter implements Presentation
{
    public function output(array $data): string
    {
        return json_encode(
            [
                'success' => true,
                'errors' => null,
                'message' => 'Registration exported sucessfully.',
                'data' => $data,
            ]
        );
    }
}
