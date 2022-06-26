<?php

namespace App\Models\Domain\Component\Button;

use App\Models\Domain\Component\AbstractUi;

abstract class AbstractButton extends AbstractUi
{
    /** 前後の隙間 @var string */
    protected string $margin = '5px';
    
    /** 塗りの余白 @var string */
    protected string $padding = '0.6em 1em';
    
    /** フォントサイズ @var string */
    protected string $fontSize = '1em';
    
    /** 背景色 royalblue @var string */
    protected string $backgroundColor = '#4169e1';
    
    /** テキストカラー white @var string */
    protected string $textColor = '#FFF';
    
    /** 指マーク @var string */
    protected string $cursor = 'pointer';
    
    /** 角の丸み @var string */
    protected string $borderRadius = '3px';
    
    /** 枠線を消す @var string */
    protected string $border = '0';
    
    /** ホバーの変化を滑らかに @var string */
    protected string $transition = '0.3s';
    
    /** ボタンに表示される文字列 @var string */
    protected string $caption = 'a button';
    
    /** 遷移先のurl @var string */
    protected string $url = '#';
    
    /**
     * @return string
     */
    public function getMargin(): string
    {
        return $this->margin;
    }
    
    /**
     * @param string|null $margin
     */
    public function setMargin(?string $margin): void
    {
        if ($margin) {
            $this->margin = $margin;
        }
    }
    
    /**
     * @return string
     */
    public function getPadding(): string
    {
        return $this->padding;
    }
    
    /**
     * @param string|null $padding
     */
    public function setPadding(?string $padding): void
    {
        if ($padding) {
            $this->padding = $padding;
        }
    }
    
    /**
     * @return string
     */
    public function getFontSize(): string
    {
        return $this->fontSize;
    }
    
    /**
     * @param string|null $fontSize
     */
    public function setFontSize(?string $fontSize): void
    {
        if ($fontSize) {
            $this->fontSize = $fontSize;
        }
    }
    
    /**
     * @return string
     */
    public function getBackgroundColor(): string
    {
        return $this->backgroundColor;
    }
    
    /**
     * @param string|null $backgroundColor
     */
    public function setBackgroundColor(?string $backgroundColor): void
    {
        if ($backgroundColor) {
            $this->backgroundColor = $backgroundColor;
        }
    }
    
    /**
     * @return string
     */
    public function getTextColor(): string
    {
        return $this->textColor;
    }
    
    /**
     * @param string|null $textColor
     */
    public function setTextColor(?string $textColor): void
    {
        if ($textColor) {
            $this->textColor = $textColor;
        }
    }
    
    /**
     * @return string
     */
    public function getCursor(): string
    {
        return $this->cursor;
    }
    
    /**
     * @param string|null $cursor
     */
    public function setCursor(?string $cursor): void
    {
        if ($cursor) {
            $this->cursor = $cursor;
        }
    }
    
    /**
     * @return string
     */
    public function getBorderRadius(): string
    {
        return $this->borderRadius;
    }
    
    /**
     * @param string|null $borderRadius
     */
    public function setBorderRadius(?string $borderRadius): void
    {
        if ($borderRadius) {
            $this->borderRadius = $borderRadius;
        }
    }
    
    /**
     * @return string
     */
    public function getBorder(): string
    {
        return $this->border;
    }
    
    /**
     * @param string|null $border
     */
    public function setBorder(?string $border): void
    {
        if ($border) {
            $this->border = $border;
        }
    }
    
    /**
     * @return string
     */
    public function getTransition(): string
    {
        return $this->transition;
    }
    
    /**
     * @param string|null $transition
     */
    public function setTransition(?string $transition): void
    {
        if ($transition) {
            $this->transition = $transition;
        }
    }
    
    /**
     * @return string
     */
    public function getCaption(): string
    {
        return $this->caption;
    }
    
    /**
     * @param string|null $caption
     */
    public function setCaption(?string $caption): void
    {
        if ($caption) {
            $this->caption = $caption;
        }
    }
    
    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }
    
    /**
     * @param string|null $url
     */
    public function setUrl(?string $url): void
    {
        if ($url) {
            $this->url = $url;
        }
    }
}
