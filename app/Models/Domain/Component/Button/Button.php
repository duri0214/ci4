<?php

namespace App\Models\Domain\Component\Button;

use App\Models\Domain\Component\Style;
use JetBrains\PhpStorm\Pure;

class Button extends AbstractButton
{
    public function __construct(string $caption, string $url, Style $style = null)
    {
        $this->setCaption($caption);
        $this->setUrl($url);
        
        if ($style) {
            $this->setMargin($style->getMargin());
            $this->setPadding($style->getPadding());
            $this->setFontSize($style->getFontSize());
            $this->setBackgroundColor($style->getBackgroundColor());
            $this->setTextColor($style->getTextColor());
            $this->setCursor($style->getCursor());
            $this->setBorderRadius($style->getBorderRadius());
            $this->setBorder($style->getBorder());
            $this->setTransition($style->getTransition());
        }
    }
    
    /**
     * @return string
     */
    #[Pure] public function getStyleAsHtml(): string
    {
        return implode(' ', [
            'margin: '.$this->getMargin().';',
            'padding: '.$this->getPadding().';',
            'font-size: '.$this->getFontSize().';',
            'background-color: '.$this->getBackgroundColor().';',
            'color: '.$this->getTextColor().';',
            'cursor: '.$this->getCursor().';',
            'border-radius: '.$this->getBorderRadius().';',
            'border: '.$this->getBorder().';',
            'transition: '.$this->getTransition().';'
        ]);
    }
    
    #[Pure] public function getOnClickAsHtml(): string
    {
        return 'location.href="'.$this->getUrl().'"';
    }
}
