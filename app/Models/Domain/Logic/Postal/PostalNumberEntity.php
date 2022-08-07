<?php

namespace App\Models\Domain\Logic\Postal;

use Exception;

class PostalNumberEntity
{
    private string $postalNumber;
    
    /**
     * @throws Exception
     */
    public function __construct(string $postalNumber)
    {
        $this->setPostalNumber($postalNumber);
    }
    
    /**
     * @return string
     */
    public function getPostalNumber(): string
    {
        return $this->postalNumber;
    }
    
    /**
     * @param string $postalNumber
     * @throws Exception
     */
    private function setPostalNumber(string $postalNumber): void
    {
        $zip = mb_convert_kana($postalNumber, 'a', 'UTF-8');
        if (preg_match("/\A\d{3}[-]\d{4}\z/", $zip) || preg_match("/\A\d{7}\z/", $zip)) {
            $this->postalNumber = $postalNumber;
        } else {
            throw new Exception('※郵便番号を 123-4567 または 1234567 の形式でご記入ください');
        }
    }
}
