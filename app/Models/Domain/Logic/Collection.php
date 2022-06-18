<?php

namespace App\Models\Domain\Logic;

class Collection
{
    protected array $items;
    
    public function addItem($item): self
    {
        $this->items[] = $item;
        
        return $this;
    }
    
    public function getItems(): array
    {
        return $this->items;
    }
}
