<?php

namespace Models\Domain\Logic\School\Demo\HighSchool\ViewUi;

use App\Models\Domain\ViewUi\School\Demo\HighSchool\LessonDetail;
use JetBrains\PhpStorm\NoReturn;
use PHPUnit\Framework\TestCase;

class LessonDetailTest extends TestCase
{
    
    #[NoReturn] public function testExportHtml()
    {
        $lessonDetail = new LessonDetail();
        dd([$lessonDetail->reportButtonsAsHtml()]);
    }
}
