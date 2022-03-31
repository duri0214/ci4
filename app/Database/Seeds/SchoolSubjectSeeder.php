<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SchoolSubjectSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'school_id' => 1,
                'name' => '国語',
            ],
            [
                'id' => 2,
                'school_id' => 1,
                'name' => '数学',
            ],
            [
                'id' => 3,
                'school_id' => 1,
                'name' => '英語',
            ],
            [
                'id' => 4,
                'school_id' => 1,
                'name' => '行事',
            ],
        ];
    
        // Using Query Builder
        $this->db->table('school_subject')->insertBatch($data);
    }
}
