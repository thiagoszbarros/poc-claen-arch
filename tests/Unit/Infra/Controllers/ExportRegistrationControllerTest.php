<?php

use App\Application\UseCases\ExportRegistration\ExportRegistration;
use App\Infra\Adapters\HtmlToPdf;
use App\Infra\Adapters\ServerStorage;
use App\Infra\Http\Controllers\ExportRegistrationController;
use App\Infra\Presentation\ExportRegistrationPresenter;
use App\Infra\Repositories\Stunt\StuntLoadRegistration;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;

test('ExportRegistrationControllerTest', function () {

    $req = new Request('GET', 'http://localhost', ['registrationNumber' => '06806573398']);
    $res = new Response();
    $repo = new StuntLoadRegistration();
    $pdfExporter = new HtmlToPdf();
    $storage = new ServerStorage();
    $useCase = new ExportRegistration($repo, $pdfExporter, $storage);

    $result = (new ExportRegistrationController($req, $res, $useCase))->execute(new ExportRegistrationPresenter());

    expect(strval($result->getBody()))
        ->toBeJson()
        ->toBe(
            '{"success":true,"errors":null,"message":"Registration exported sucessfully.","data":{"fullFileName":"registrations\/xpto.pdf"}}'
        );
});
