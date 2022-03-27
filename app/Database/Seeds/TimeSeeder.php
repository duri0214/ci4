<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TimeSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['id' => 1, 'm_school_id' => 1, 'name' => 'shr'],
            ['id' => 2, 'm_school_id' => 1, 'name' => 'shr_sp'],
            ['id' => 3, 'm_school_id' => 1, 'name' => 'lhr_sp'],
            ['id' => 4, 'm_school_id' => 1, 'name' => '1時間目'],
            ['id' => 5, 'm_school_id' => 1, 'name' => '2時間目'],
            ['id' => 6, 'm_school_id' => 1, 'name' => '3時間目'],
            ['id' => 7, 'm_school_id' => 1, 'name' => '4時間目'],
            ['id' => 8, 'm_school_id' => 1, 'name' => '5時間目'],
            ['id' => 9, 'm_school_id' => 1, 'name' => '6時間目'],
        ];
    
        // Using Query Builder
        $this->db->table('m_time')->insertBatch($data);
    }
}
