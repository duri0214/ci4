<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class StatusSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['name' => '出席', 'school_id' => 1],
            ['name' => '欠席', 'school_id' => 1],
            ['name' => '遅刻', 'school_id' => 1],
            ['name' => '早退', 'school_id' => 1],
            ['name' => '忌引', 'school_id' => 1],
            ['name' => '出席停止', 'school_id' => 1],
            ['name' => '公欠', 'school_id' => 1],
            ['name' => '遅刻早退', 'school_id' => 1],
            ['name' => '留学', 'school_id' => 1],
            ['name' => '休学', 'school_id' => 1],
            ['name' => '特認', 'school_id' => 1],
        ];
    
        // Using Query Builder
        $this->db->table('m_status')->insertBatch($data);
    }
}
