<?php

namespace App\Models\Domain\ViewUi\School\Demo\HighSchool;

use App\Models\Domain\Component\AbstractView;
use App\Models\Domain\Component\Button\Button;
use App\Models\Domain\Component\Style;
use App\Models\Domain\Logic\Collection;

class LessonDetail extends AbstractView
{
    public function __construct()
    {
        $style = new Style();
        $style->setBackgroundColor('#FF4500');
        
        $this->reportButtons = new Collection();
        $this->reportButtons->addItem(new Button('成績一覧表1', 'https://www.google.com/'));
        $this->reportButtons->addItem(new Button('成績一覧表2', 'https://www.google.com/'));
        $this->reportButtons->addItem(new Button('成績一覧表3（成績会議用）', 'https://www.google.com/', $style));
        $this->reportButtons->addItem(new Button('成績一覧表4', 'https://www.google.com/'));
    }
    
    /**
     * @return string
     */
    public function reportButtons(): string
    {
        $html = '';
        if (count($this->reportButtons->getItems()) > 0) {
            foreach ($this->reportButtons->getItems() as $item) {
                $style = $item->getStyleAsHtml();
                $onClick = $item->getOnClickAsHtml();
                $caption = $item->getCaption();
                $html .= "<button style='$style' type='button' onclick='$onClick'>$caption</button>";
            }
        }
    
        return $html;
    }
}
