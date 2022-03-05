<?php

namespace App\Libraries;

class Breadcrumb
{
    private array $breadcrumbs;
    
    public function add($displayName, $url)
    {
        $this->breadcrumbs[] = [$displayName, $url];
    }
    
    public function render(): string
    {
        $html = null;
        foreach ($this->breadcrumbs as $index => $value) {
            if ($index > 0 && $index < count($this->breadcrumbs)) {
                $html .= ' / ';
            }
            $html .= '<a href="'.$value[1].'">'.$value[0].'</a>';
        }
        
        return $html;
    }
}
