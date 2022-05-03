<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'email' => 'demo_t1@gmail.ac.jp',
                'username' => 'デモ ミドルネーム 先生（管理者）',
                'activate_hash' => '59481d0b64af5c49a971bee3ea104ba9',
                'password_hash' => password_hash('yoshi0214', PASSWORD_DEFAULT),
                'active' => 1,
            ],
            [
                'id' => 2,
                'email' => 'demo_t2@gmail.ac.jp',
                'username' => 'デモ　先生（非常勤）',
                'activate_hash' => '579257a205f0b1c4947f01d4979afdf4',
                'password_hash' => password_hash('yoshi0214', PASSWORD_DEFAULT),
                'active' => 1,
            ],
            [
                'id' => 3,
                'email' => 'demo_s1@gmail.ac.jp',
                'username' => 'デモ　学生1（学生）',
                'activate_hash' => 'd2fa3e3300c5b8cf063370bd4a0bd65b',
                'password_hash' => password_hash('yoshi0214', PASSWORD_DEFAULT),
                'active' => 1,
            ],
            [
                'id' => 4,
                'email' => 'demo_s2@gmail.ac.jp',
                'username' => 'デモ　学生2（学生）',
                'activate_hash' => '22d3361a78799d5848f11e1fae664435',
                'password_hash' => password_hash('yoshi0214', PASSWORD_DEFAULT),
                'active' => 1,
            ],
            [
                'id' => 5,
                'email' => 'demo_s3@gmail.ac.jp',
                'username' => 'デモ　学生3（学生）',
                'activate_hash' => '14a0e6c60dd6850d9af115d5e6065261',
                'password_hash' => password_hash('yoshi0214', PASSWORD_DEFAULT),
                'active' => 1,
            ],
        ];
    
        // Using Query Builder
        $this->db->table('users')->insertBatch($data);
    }
}
