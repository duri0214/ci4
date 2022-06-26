<?php

namespace App\Models\Domain\Component;

use App\Models\Domain\Logic\Collection;

abstract class AbstractView
{
    protected Collection $reportButtons;

    /**
     * 授業詳細画面で標準的に配置されるボタンのhtml
     * @return string
     */
    abstract public function reportButtons(): string;
}
