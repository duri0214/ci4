<?php

namespace App\Libraries;

use DateTime;

class DateUtil
{
    /**
     * 年度を取得する
     * @param DateTime $d
     * @return DateTime
     */
    public function fiscalYear(DateTime $d): String
    {
        return $d->modify('-3 month')->format('Y');
    }
}
