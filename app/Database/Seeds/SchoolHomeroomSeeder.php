<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SchoolHomeroomSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'school_id' => 1,
                'hr_grade' => 1,
                'hr_class' => 1,
                'name' => '1年1組',
                'remark' => '普通のクラス',
            ],
            [
                'id' => 2,
                'school_id' => 1,
                'hr_grade' => 2,
                'hr_class' => 1,
                'name' => '2年1組',
                'remark' => '普通のクラス',
            ],
            [
                'id' => 3,
                'school_id' => 1,
                'hr_grade' => 3,
                'hr_class' => 1,
                'name' => '3年1組',
                'remark' => '普通のクラス',
            ],
        ];
    
        // Using Query Builder
        $this->db->table('school_homeroom')->insertBatch($data);
    }
}
