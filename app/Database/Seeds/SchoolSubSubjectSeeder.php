<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SchoolSubSubjectSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'school_id' => 1,
                'school_subject_id' => 1,
                'name' => '国語総合',
            ],
            [
                'id' => 2,
                'school_id' => 1,
                'school_subject_id' => 2,
                'name' => '数学Ⅰ',
            ],
            [
                'id' => 3,
                'school_id' => 1,
                'school_subject_id' => 3,
                'name' => '英語',
            ],
            [
                'id' => 4,
                'school_id' => 1,
                'school_subject_id' => 4,
                'name' => '入学式',
            ],
        ];
    
        // Using Query Builder
        $this->db->table('school_sub_subject')->insertBatch($data);
    }
}
