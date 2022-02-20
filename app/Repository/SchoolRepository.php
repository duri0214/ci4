<?php

namespace App\Repository;

use App\Domain\SchoolDomain;
use App\Entities\SchoolEntity;
use App\Models\SchoolModel;

class SchoolRepository extends SchoolModel
{
    /** SchoolEntityから関連テーブルの情報を取得
     * @param SchoolEntity $school
     * @return SchoolDomain
     */
    public function getSchoolDomain(SchoolEntity $school): SchoolDomain
    {
        // TODO: なにしようとしてたっけ？これ
        $domain->setSchoolCode($this->db->table('school_code')->where('id', $school->getSchoolCode()));
        $domain->setSchoolCategory($this->db->table('school_category')->where('id', $school->getSchoolCategoryId()));
        $domain->setPeriods($this->db->table('period')->where('school_id', $school->getId()));
    
        return $domain;
    }
    
    /**  insertサンプルです
     * @param SchoolEntity $data
     * @return int|string
     */
    public function insertWithTrans(SchoolEntity $data)
    {
        $this->db->transBegin();
        $q = $this->db->table($this->table)->insert($data->toArray());
        if (!$this->db->transStatus()) {
            $this->db->transRollback();
            return $q->getErrorMessage();
        }
        $this->db->transCommit();
        
        return $this->db->insertID();
    }
    
    /** deleteサンプルです
     * @param $id
     * @return bool|\CodeIgniter\Database\BaseResult
     */
    public function deleteData($id)
    {
        return $this->delete(['id' => $id]);
    }
}
