<?php

namespace App\Models\Domain\Logic\School\Demo\JuniorHighSchool;

use App\Models\Domain\Logic\Pdf\IPdf;

class Report
{
    public function __construct(IPdf $pdfDriver)
    {
        $pdf = $pdfDriver;
        $pdf->render();
    }
}
