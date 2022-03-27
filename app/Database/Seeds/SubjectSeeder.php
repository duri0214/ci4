<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SubjectSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'name' => '国語',
            ],
            [
                'id' => 2,
                'name' => '数学',
            ],
            [
                'id' => 3,
                'name' => '英語',
            ],
            [
                'id' => 4,
                'name' => '行事',
            ],
        ];
    
        // Using Query Builder
        $this->db->table('m_subject')->insertBatch($data);
    }
}
