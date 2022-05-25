<?php

namespace App\Models\Domain\Logic;

interface IGrades
{
    /**
     * 評定
     * @param int $groupId
     * @return array
     */
    public function autoRating(int $groupId): array;
    
    /**
     * 自動計算された評価値
     * @param float $score
     * @return float
     */
    public function evaluate(float $score): float;
}
