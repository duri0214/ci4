<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SchoolCurriculumSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'school_id' => 1,
                'name' => '普通コース',
            ],
            [
                'id' => 2,
                'school_id' => 1,
                'name' => '定時制コース',
            ],
            [
                'id' => 3,
                'school_id' => 1,
                'name' => '通信コース',
            ],
        ];
    
        // Using Query Builder
        $this->db->table('school_curriculum')->insertBatch($data);
    }
}
