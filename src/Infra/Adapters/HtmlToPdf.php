<?php

declare(strict_types=1);

namespace App\Infra\Adapters;

use App\Application\Contracts\ExportRegistrationPdfExporter;
use App\Domain\Entities\Registration;
use Spipu\Html2Pdf\Html2Pdf;

class HtmlToPdf implements ExportRegistrationPdfExporter
{
    public function export(Registration $registration): string
    {
        $html2pdf = new Html2Pdf('P', 'A4');

        $html2pdf->setDefaultFont('Arial');
        $html2pdf->writeHTML(
            "<p>Nome: {$registration->getName()}</p><p>CPF: {$registration->getRegistrationNumber()}</p>"
        );

        return $html2pdf->output('', 'S');
    }
}
