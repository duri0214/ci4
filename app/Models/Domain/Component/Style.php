<?php

namespace App\Models\Domain\Component;

class Style
{
    /** 前後の隙間 @var ?string */
    private ?string $margin = null;
    
    /** 塗りの余白 @var ?string */
    private ?string $padding = null;
    
    /** フォントサイズ @var ?string */
    private ?string $fontSize = null;
    
    /** 背景色 royalblue @var ?string */
    private ?string $backgroundColor = null;
    
    /** テキストカラー white @var ?string */
    private ?string $textColor = null;
    
    /** 指マーク @var ?string */
    private ?string $cursor = null;
    
    /** 角の丸み @var ?string */
    private ?string $borderRadius = null;
    
    /** 枠線を消す @var ?string */
    private ?string $border = null;
    
    /** ホバーの変化を滑らかに @var ?string */
    private ?string $transition = null;
    
    /** ボタンに表示される文字列 @var ?string */
    private ?string $caption = null;
    
    /**
     * @return ?string
     */
    public function getMargin(): ?string
    {
        return $this->margin;
    }
    
    /**
     * @param string $margin
     */
    public function setMargin(string $margin): void
    {
        $this->margin = $margin;
    }
    
    /**
     * @return ?string
     */
    public function getPadding(): ?string
    {
        return $this->padding;
    }
    
    /**
     * @param string $padding
     */
    public function setPadding(string $padding): void
    {
        $this->padding = $padding;
    }
    
    /**
     * @return ?string
     */
    public function getFontSize(): ?string
    {
        return $this->fontSize;
    }
    
    /**
     * @param string $fontSize
     */
    public function setFontSize(string $fontSize): void
    {
        $this->fontSize = $fontSize;
    }
    
    /**
     * @return ?string
     */
    public function getBackgroundColor(): ?string
    {
        return $this->backgroundColor;
    }
    
    /**
     * @param string $backgroundColor
     */
    public function setBackgroundColor(string $backgroundColor): void
    {
        $this->backgroundColor = $backgroundColor;
    }
    
    /**
     * @return ?string
     */
    public function getTextColor(): ?string
    {
        return $this->textColor;
    }
    
    /**
     * @param string $textColor
     */
    public function setTextColor(string $textColor): void
    {
        $this->textColor = $textColor;
    }
    
    /**
     * @return ?string
     */
    public function getCursor(): ?string
    {
        return $this->cursor;
    }
    
    /**
     * @param string $cursor
     */
    public function setCursor(string $cursor): void
    {
        $this->cursor = $cursor;
    }
    
    /**
     * @return ?string
     */
    public function getBorderRadius(): ?string
    {
        return $this->borderRadius;
    }
    
    /**
     * @param string $borderRadius
     */
    public function setBorderRadius(string $borderRadius): void
    {
        $this->borderRadius = $borderRadius;
    }
    
    /**
     * @return ?string
     */
    public function getBorder(): ?string
    {
        return $this->border;
    }
    
    /**
     * @param string $border
     */
    public function setBorder(string $border): void
    {
        $this->border = $border;
    }
    
    /**
     * @return ?string
     */
    public function getTransition(): ?string
    {
        return $this->transition;
    }
    
    /**
     * @param string $transition
     */
    public function setTransition(string $transition): void
    {
        $this->transition = $transition;
    }
    
    /**
     * @return ?string
     */
    public function getCaption(): ?string
    {
        return $this->caption;
    }
    
    /**
     * @param string $caption
     */
    public function setCaption(string $caption): void
    {
        $this->caption = $caption;
    }
}
