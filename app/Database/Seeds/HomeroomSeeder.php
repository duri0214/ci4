<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class HomeroomSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'hr_grade' => 1,
                'hr_class' => 1,
                'name' => '1年1組',
                'remark' => '普通のクラス',
                'm_school_id' => 1,
            ],
            [
                'id' => 2,
                'hr_grade' => 2,
                'hr_class' => 1,
                'name' => '2年1組',
                'remark' => '普通のクラス',
                'm_school_id' => 1,
            ],
            [
                'id' => 3,
                'hr_grade' => 3,
                'hr_class' => 1,
                'name' => '3年1組',
                'remark' => '普通のクラス',
                'm_school_id' => 1,
            ],
        ];
    
        // Using Query Builder
        $this->db->table('m_homeroom')->insertBatch($data);
    }
}
