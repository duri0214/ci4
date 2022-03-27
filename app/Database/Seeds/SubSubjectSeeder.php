<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SubSubjectSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'm_subject_id' => 1,
                'name' => '国語総合',
            ],
            [
                'm_subject_id' => 2,
                'name' => '数学Ⅰ',
            ],
            [
                'm_subject_id' => 3,
                'name' => '英語',
            ],
            [
                'm_subject_id' => 4,
                'name' => '入学式',
            ],
        ];
    
        // Using Query Builder
        $this->db->table('m_sub_subject')->insertBatch($data);
    }
}
