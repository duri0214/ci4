<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SchoolAttendStatusSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['id' => 1, 'school_id' => 1, 'name' => '出席'],
            ['id' => 2, 'school_id' => 1, 'name' => '欠席'],
            ['id' => 3, 'school_id' => 1, 'name' => '遅刻'],
            ['id' => 4, 'school_id' => 1, 'name' => '早退'],
            ['id' => 5, 'school_id' => 1, 'name' => '忌引'],
            ['id' => 6, 'school_id' => 1, 'name' => '出席停止'],
            ['id' => 7, 'school_id' => 1, 'name' => '公欠'],
            ['id' => 8, 'school_id' => 1, 'name' => '遅刻早退'],
            ['id' => 9, 'school_id' => 1, 'name' => '留学'],
            ['id' => 10, 'school_id' => 1, 'name' => '休学'],
            ['id' => 11, 'school_id' => 1, 'name' => '特認'],
        ];
    
        // Using Query Builder
        $this->db->table('school_attend_status')->insertBatch($data);
    }
}
