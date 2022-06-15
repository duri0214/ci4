<?php

namespace App\Models\Domain\Logic\School\NihonBunri\JuniorHighSchool;

use App\Models\Domain\Logic\AbstractGrades;
use App\Models\Domain\Logic\ICsv;
use App\Models\Domain\Logic\IGrades;
use App\Models\Domain\SchoolDomain;
use JetBrains\PhpStorm\Pure;

class Grades extends AbstractGrades implements IGrades, ICsv
{
    public const SCHOOL_CODE = 'NihonBunri';
    
    /**
     * @param SchoolDomain $domain
     */
    #[Pure] public function __construct(SchoolDomain $domain)
    {
        $this->school = $domain->getSchoolEntity();
        $this->school_category = $domain->getSchoolCategory();
    }
    
    /**
     * @param int $groupId
     * @return array
     */
    public function autoRating(int $groupId): array
    {
        // TODO: $groupId に紐づく生徒の点数（モデルから引く）
        $scoreRecords = [
            1000 => [
                // grades（entity）のリスト
                // 'period' は n学期。学校ごとにある
                // 'term' の 1 は 'mid', 2 は 'end'。学校ごとにある
                // 'category' 1 は '素点'（見込み点、学期評点、仮評定とかもある）。学校ごとにある（UIで増減する）
                ['period' => 1, 'term' => 1, 'category' => 1, 'score' => 55],
                ['period' => 1, 'term' => 2, 'category' => 1, 'score' => 70],
                ['period' => 2, 'term' => 1, 'category' => 1, 'score' => 30],
                ['period' => 2, 'term' => 2, 'category' => 1, 'score' => 65],
                ['period' => 3, 'term' => 2, 'category' => 1, 'score' => 80]
            ],
            1001 => [
                ['period' => 1, 'term' => 1, 'category' => 1, 'score' => 57],
                ['period' => 1, 'term' => 2, 'category' => 1, 'score' => 56],
                ['period' => 2, 'term' => 1, 'category' => 1, 'score' => 56],
                ['period' => 2, 'term' => 2, 'category' => 1, 'score' => 45],
                ['period' => 3, 'term' => 2, 'category' => 1, 'score' => 70]
            ],
            1002 => [
                ['period' => 1, 'term' => 1, 'category' => 1, 'score' => 75],
                ['period' => 1, 'term' => 2, 'category' => 1, 'score' => 60],
                ['period' => 2, 'term' => 1, 'category' => 1, 'score' => 40],
                ['period' => 2, 'term' => 2, 'category' => 1, 'score' => 55],
                ['period' => 3, 'term' => 2, 'category' => 1, 'score' => 75]
            ],
        ];
        
        $update = [];
        $yearEndScores = [];
        foreach ($scoreRecords as $studentId => $scores) {
            if (count($scores) >0) {
                $yearEndScores[$studentId] = round(array_sum($scores)/count($scores));
            }
            
            // TODO: repositoryで管理する
            $update['student_id'] = $studentId;
            $update['group_id'] = $groupId;
            $update['period_id'] = end($periodIds);
            $update['term'] = 'end';
            $update['year_end_score'] = $yearEndScores[$studentId];
            $update['year_end_rating'] = $this->evaluate($yearEndScores[$studentId]);
        }
    
        return $update;
    }
    
    /**
     * 「5」80点以上 　「4」65~79点　「3」50~64点　「2」40~49点　「1」0~39点　（仮評定も同様）
     * @param float $score
     * @return float
     */
    public function evaluate(float $score): float
    {
        return match (true) {
            $score >= 80 => 5,
            $score >= 65 => 4,
            $score >= 50 => 3,
            $score >= 40 => 2,
            default => 1,
        };
    }
}
