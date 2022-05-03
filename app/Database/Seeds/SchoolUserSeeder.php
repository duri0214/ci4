<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SchoolUserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'school_id' => 1,
                'user_id' => 1,
            ],
            [
                'id' => 2,
                'school_id' => 1,
                'user_id' => 2,
            ],
            [
                'id' => 3,
                'school_id' => 1,
                'user_id' => 3,
            ],
            [
                'id' => 4,
                'school_id' => 1,
                'user_id' => 4,
            ],
            [
                'id' => 5,
                'school_id' => 1,
                'user_id' => 5,
            ],
        ];
    
        // Using Query Builder
        $this->db->table('school_user')->insertBatch($data);
    }
}
