<?php

namespace App\Repository;

use App\Entities\SchoolEntity;
use App\Models\PeriodModel;

class PeriodRepository extends PeriodModel
{
    // /**
    //  * @param SchoolEntity $school
    //  * @return PeriodModel|null
    //  */
    // public function getSchoolPeriod(SchoolEntity $school): ?PeriodModel
    // {
    //     if ($school->id) {
    //         $model = service('periodModel');
    //         $model->entity = $model->where('school_id', $school->id)->findAll();
    //
    //         return $model;
    //     }
    //
    //     return null;
    // }
    
    /** いまが学年末評定時期（3学期期末）かどうか
     * @return bool
     */
    public function isTimeOnEvaluation(): bool
    {
        // TODO:
        return true;
    }
    
    /**
     * @return array
     */
    public function getTheStartAndEndPeriodOnTheYear(): array
    {
        // TODO: e.g. 期間が 4/6 - 3/11 の a entity startとendを調節して返す
    }
    
    /**
     * @return array [991, 992, 993]
     */
    public function getPeriodIds(): array
    {
        // TODO: entityからidのリストを返す
    }
    
    /**
     * @return array
     */
    public function getFullLengthPeriod(): array
    {
        // TODO: return a period entity
    }
    
    /**
     * @return array
     */
    public function getMixedOnReference(): array
    {
        // TODO: $referenceValues をミキシングしたperiodsを返す
        // 1学期期初～参照1, 参照1の翌日～参照2, 参照2の翌日～参照3
        // ただ、これは学校ごとに違うから学校のクラスのほうに持ったほうがええかも
    }
}
