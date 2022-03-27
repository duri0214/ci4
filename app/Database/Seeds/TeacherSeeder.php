<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TeacherSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'name' => 'デモ先生',
                'm_user_id' => 2,
            ],
            [
                'id' => 2,
                'name' => 'デモ先生（兼任）',
                'm_user_id' => 2,
            ],
        ];
    
        // Using Query Builder
        $this->db->table('m_teacher')->insertBatch($data);
    }
}
