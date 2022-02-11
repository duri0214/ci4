<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => '岡田 義隆',
                'user_category_id' => 4,
                'user_role_id' => 5,
            ],
            [
                'name' => '学校 ミドルネーム 先生',
                'user_category_id' => 1,
                'user_role_id' => 1,
            ],
        ];
    
        // Using Query Builder
        $this->db->table('user')->insertBatch($data);
    }
}
