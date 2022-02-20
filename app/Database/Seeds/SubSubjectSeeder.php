<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SubSubjectSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'subject_id' => 1,
                'name' => '国語総合',
            ],
            [
                'subject_id' => 2,
                'name' => '数学Ⅰ',
            ],
            [
                'subject_id' => 3,
                'name' => '英語',
            ],
            [
                'subject_id' => 4,
                'name' => '入学式',
            ],
        ];
    
        // Using Query Builder
        $this->db->table('sub_subject')->insertBatch($data);
    }
}
