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
                'name' => 'デモ ミドルネーム 先生（管理者）',
                'email' => 'demo_t1@gmail.ac.jp',
            ],
            [
                'id' => 2,
                'school_id' => 1,
                'name' => 'デモ　先生（非常勤）',
                'email' => 'demo_t2@gmail.ac.jp',
            ],
            [
                'id' => 3,
                'school_id' => 1,
                'name' => 'デモ　学生1（学生）',
                'email' => 'demo_s1@gmail.ac.jp',
            ],
            [
                'id' => 4,
                'school_id' => 1,
                'name' => 'デモ　学生2（学生）',
                'email' => 'demo_s2@gmail.ac.jp',
            ],
            [
                'id' => 5,
                'school_id' => 1,
                'name' => 'デモ　学生3（学生）',
                'email' => 'demo_s3@gmail.ac.jp',
            ],
        ];
    
        // Using Query Builder
        $this->db->table('school_user')->insertBatch($data);
    }
}
