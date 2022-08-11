<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $activateHash = env('dummy.activateHash');
        $passwordHash = env('dummy.password');
        $data = [
            [
                'id' => 1,
                'email' => 'demo_t1@gmail.ac.jp',
                'username' => 'デモ先生 複数学校兼務（管理者）',
                'activate_hash' => $activateHash,
                'password_hash' => $passwordHash,
                'active' => 1,
            ],
            [
                'id' => 2,
                'email' => 'demo_t2@gmail.ac.jp',
                'username' => 'デモ　先生（非常勤）',
                'activate_hash' => $activateHash,
                'password_hash' => $passwordHash,
                'active' => 1,
            ],
            [
                'id' => 3,
                'email' => 'demo_s1@gmail.ac.jp',
                'username' => 'デモ　学生1（学生）',
                'activate_hash' => $activateHash,
                'password_hash' => $passwordHash,
                'active' => 1,
            ],
            [
                'id' => 4,
                'email' => 'demo_s2@gmail.ac.jp',
                'username' => 'デモ　学生2（学生）',
                'activate_hash' => $activateHash,
                'password_hash' => $passwordHash,
                'active' => 1,
            ],
            [
                'id' => 5,
                'email' => 'demo_s3@gmail.ac.jp',
                'username' => 'デモ　学生3（学生）',
                'activate_hash' => $activateHash,
                'password_hash' => $passwordHash,
                'active' => 1,
            ],
        ];
    
        // Using Query Builder
        $this->db->table('users')->insertBatch($data);
    }
}
