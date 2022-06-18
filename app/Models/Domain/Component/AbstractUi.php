<?php

namespace App\Models\Domain\Component;

abstract class AbstractUi
{
    /**
     * styleプロパティを集めてhtml化
     * @return string
     */
    abstract public function getStyleAsHtml(): string;
    
    /**
     * onClickプロパティをhtml化
     * @return string
     */
    abstract public function getOnClickAsHtml(): string;
}
