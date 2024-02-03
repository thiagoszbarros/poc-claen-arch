<?php

declare(strict_types=1);

namespace App\Infra\Http\Controllers;

use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Application\UseCases\ExportRegistration\ExportRegistration;
use App\Application\UseCases\ExportRegistration\Dtos\ExportRegistrationInput;


final readonly class ExportRegistrationController
{
    public function __construct(
        private Request $request,
        private Response $response,
        private ExportRegistration $useCase,
    ) {
    }

    public function execute(Presentation $presentation): Response
    {
        $input = new ExportRegistrationInput(
            $this->request->getHeaderLine("registrationNumber"),
            'xpto',
            'registrations',
        );

        $result = $this->useCase->execute($input);


        $this->response->getBody()->write($presentation->output(['fullFileName' => $result->getFullFilename()]));

        return $this->response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(200);
    }
}
