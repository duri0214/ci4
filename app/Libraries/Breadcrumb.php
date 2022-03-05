<?php

namespace App\Libraries;

class Breadcrumb
{
    private array $breadcrumbs;
    
    /** パンくずを追加
     * @param $displayName
     * @param $url
     * @return void
     */
    public function add($displayName, $url)
    {
        $this->breadcrumbs[] = [$displayName, $url];
    }
    
    /** パンくずをhtmlに組み立て
     * @return string|null
     */
    public function render(): ?string
    {
        $html = null;
        foreach ($this->breadcrumbs as $index => $value) {
            if ($index > 0) {
                $html .= ' / ';
            }
            if ($index < count($this->breadcrumbs) - 1) {
                $html .= '<a href="'.$value[1].'">'.$value[0].'</a>';
            } else {
                $html .= $value[0];
            }
        }
        
        return $html;
    }
}
