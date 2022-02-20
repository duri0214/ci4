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
                'email' => 'yoshi@gmail.ac.jp',
                'user_category_id' => 4,
                'user_role_id' => 5,
            ],
            [
                'name' => 'デモ ミドルネーム 先生',
                'email' => 'demo@gmail.ac.jp',
                'user_category_id' => 1,
                'user_role_id' => 1,
            ],
        ];
    
        // Using Query Builder
        $this->db->table('user')->insertBatch($data);
    }
}
