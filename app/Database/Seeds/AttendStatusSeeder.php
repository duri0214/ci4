<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AttendStatusSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['m_school_id' => 1, 'name' => '出席'],
            ['m_school_id' => 1, 'name' => '欠席'],
            ['m_school_id' => 1, 'name' => '遅刻'],
            ['m_school_id' => 1, 'name' => '早退'],
            ['m_school_id' => 1, 'name' => '忌引'],
            ['m_school_id' => 1, 'name' => '出席停止'],
            ['m_school_id' => 1, 'name' => '公欠'],
            ['m_school_id' => 1, 'name' => '遅刻早退'],
            ['m_school_id' => 1, 'name' => '留学'],
            ['m_school_id' => 1, 'name' => '休学'],
            ['m_school_id' => 1, 'name' => '特認'],
        ];
    
        // Using Query Builder
        $this->db->table('m_attend_status')->insertBatch($data);
    }
}
