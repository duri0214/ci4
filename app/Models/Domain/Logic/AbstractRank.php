<?php

namespace App\Models\Domain\Logic;

abstract class AbstractRank
{
    /**
     * 同率順位処理ありのランキング算出 https://kinocolog.com/php_ranking/
     * @param array $rankers
     * @param string $columnForRanking e.g. xxx_score
     * @param int $direction
     * @return array
     */
    public function ranking(array $rankers, string $columnForRanking, int $direction = SORT_DESC): array
    {
        array_multisort(array_column($rankers, $columnForRanking), $direction, $rankers);
    
        $rankersAfterProcessing = [];
        $last_score = 0;
        $rank = $hierarchy = 1;
        foreach ($rankers as $ranker) {
            // no change ranking if same score
            if ($last_score != $ranker[$columnForRanking]) {
                $rank = $hierarchy;
            }
            
            $rankersAfterProcessing[] = array_merge($ranker, ['rank' => $rank]);
            
            $last_score = $ranker[$columnForRanking];
            $hierarchy++;
        }
        
        return $rankersAfterProcessing;
    }
    
    /**
     * 度数分布表を返します
     * @param array $scales
     * @param array $scores
     * @return array
     */
    public function frequencyDistributionTable(array $scales, array $scores): array
    {
        $range = [];
        foreach ($scales as $key) {
            $range[$key] = 0;
            foreach ($scores as $score => $value) {
                if ($value >= $key) {
                    $range[$key]++;
                    unset($scores[$score]);
                }
            }
        }
        
        return $range;
    }
}
