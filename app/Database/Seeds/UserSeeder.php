<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => '岡田 義隆（開発者）',
                'email' => 'yoshi@gmail.ac.jp',
                'm_category_id' => 11,
            ],
            [
                'name' => 'デモ ミドルネーム 先生（管理者）',
                'email' => 'demo@gmail.ac.jp',
                'm_category_id' => 7,
            ],
        ];
    
        // Using Query Builder
        $this->db->table('m_user')->insertBatch($data);
    }
}
