<?php

namespace App\Libraries;

class ArrayUtil
{
    /** $exam_score_list から $needle 個ごとにブレイクして平均（整数へ四捨五入）を取る
     * @param $exam_score_list array $exam_score_list [70, 65, 70, 65, 70]　素点が入っている
     * @param $needle
     * @return array [68, 68, 70] を返す
     */
    private function rolling(array $exam_score_list, $needle)
    {
        $grade_score = 0;
        $grade_score_list = [];
        $has_stack = false;
        for ($i = 0; $i < count($exam_score_list); $i++) {
            $grade_score += $exam_score_list[$i];
            $has_stack = true;
            // 偶数ごとに平均（※添字としては -1 なので奇数ごと）
            if ($i % $needle != 0) {
                $grade_score_list[] = round($grade_score / $needle);
                $grade_score = 0;
                $has_stack = false;
            }
        }
        if ($has_stack) {
            $grade_score_list[] = $grade_score;
        }
        
        return $grade_score_list;
    }
}
