<?php

namespace App\Libraries;

use DateTime;

class Util
{
    /**
     * dev\ci4_batches> php batches\public\index.php home generatePdf
     * @param string $filePath
     */
    public function generatePdf(String $filePath = 'D:\OneDrive\ダウンロード\sample.pdf')
    {
        // TODO: filepathの絶対パスを解決する
        
        $param = [
            'orientation' => 'Landscape', // 用紙の向き
            'unit' => 'mm', // 単位
            'format' => 'A4', // 用紙フォーマット
            'encoding' => 'UTF-8' // 文字コード
        ];
        $tcpdf = service('tcpdf', $param);
        
        $tcpdf->AddPage();
        $tcpdf->setAuthor('Yoshi.');
        
        // TODO: viewをloadしてください
        $html = '<H1>Hello World!</H1>';
        $tcpdf->writeHTML($html);
        $tcpdf->Output($filePath, 'F');
    }
    
    /**
     * https://kinocolog.com/php_ranking/
     * @param array $items
     * @param string $sortKey
     * @return array
     */
    public function ranking(array $items, string $sortKey): array
    {
        $newRanking = [];
        
        array_multisort(array_column($items, $sortKey), SORT_DESC, $items);
        
        $before_point = 0;
        $count = 1;
        $rank = 1;
        foreach ($items as $value) {
            if ($before_point != $value[$sortKey]) {
                $rank = $count;
            }
            $newRanking[] = ['rank' => $rank, 'name' => $value['name'], 'point' => $value['point']];
            
            $before_point = $value[$sortKey];
            $count++;
        }
        
        return $newRanking;
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
    
    /**
     * 年度を取得する
     * @param DateTime $d
     * @return DateTime
     */
    public function fiscalYear(DateTime $d): String
    {
        return $d->modify('-3 month')->format('Y');
    }
    
    
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
