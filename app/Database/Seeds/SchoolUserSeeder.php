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
                'active' => 1
            ],
            [
                'id' => 2,
                'school_id' => 2,
                'user_id' => 1,
                'active' => 0
            ],
            [
                'id' => 3,
                'school_id' => 1,
                'user_id' => 2,
                'active' => 1
            ],
            [
                'id' => 4,
                'school_id' => 1,
                'user_id' => 3,
                'active' => 1
            ],
            [
                'id' => 5,
                'school_id' => 1,
                'user_id' => 4,
                'active' => 1
            ],
            [
                'id' => 6,
                'school_id' => 1,
                'user_id' => 5,
                'active' => 1
            ],
        ];
    
        // Using Query Builder
        $this->db->table('school_user')->insertBatch($data);
    }
}
