<?php

namespace App\Libraries;

class Breadcrumb
{
    private array $breadcrumbs;
    
    /** パンくずを追加
     * @param string $displayName
     * @param ?string $url nullを指定するとただの文字列になります
     * @return void
     */
    public function add(string $displayName, ?string $url)
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
            $html .= !is_null($value[1]) ? '<a href="'.$value[1].'">'.$value[0].'</a>' : $value[0];
        }
        
        return $html;
    }
}
