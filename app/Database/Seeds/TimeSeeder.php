<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TimeSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['name' => 'shr', 'school_id' => 1],
            ['name' => 'shr_sp', 'school_id' => 1],
            ['name' => 'lhr_sp', 'school_id' => 1],
            ['name' => '1時間目', 'school_id' => 1],
            ['name' => '2時間目', 'school_id' => 1],
            ['name' => '3時間目', 'school_id' => 1],
            ['name' => '4時間目', 'school_id' => 1],
            ['name' => '5時間目', 'school_id' => 1],
            ['name' => '6時間目', 'school_id' => 1],
        ];
    
        // Using Query Builder
        $this->db->table('m_time')->insertBatch($data);
    }
}
