<?php

namespace App\Libraries;

class Util
{
    /**
     * 必要なメンバーを計算する
     * タスク量の合計が93時間で、あと10日(80時間)しかない。 93÷80＝1.16人必要
     * @param array $params
     * @param int $hourOfDay
     * @return float
     */
    public function necessaryMembers(array $params, int $hourOfDay = 8): float
    {
        // 1日8時間、1か月20日稼働すると仮定して計算したのが人月です
        // 1人のエンジニアが1日8時間、20日作業してこなせる仕事量が1人月
        // 30人月を、6か月で終わらせるには 30÷6＝5人 が必要なメンバー数になります
        // 最初の4か月は4人で作業したプロジェクトが、進捗が遅れていたので、残りの2か月は6人で作業することになった
        // 4か月(8h*4month)×4人＝16人月 + 2か月(8h*2month)×6人＝12人月 = 28人月
        $total = 0.0;
        foreach ($params as $values) {
            $total += round($values["tasks"] * $values["ratio"] / ($values["days"] * $hourOfDay), 2);
        }
        
        return $total;
    }
}
