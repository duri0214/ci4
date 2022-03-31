<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SchoolTimeSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['id' => 1, 'school_id' => 1, 'name' => 'shr'],
            ['id' => 2, 'school_id' => 1, 'name' => 'shr_sp'],
            ['id' => 3, 'school_id' => 1, 'name' => 'lhr_sp'],
            ['id' => 4, 'school_id' => 1, 'name' => '1時間目'],
            ['id' => 5, 'school_id' => 1, 'name' => '2時間目'],
            ['id' => 6, 'school_id' => 1, 'name' => '3時間目'],
            ['id' => 7, 'school_id' => 1, 'name' => '4時間目'],
            ['id' => 8, 'school_id' => 1, 'name' => '5時間目'],
            ['id' => 9, 'school_id' => 1, 'name' => '6時間目'],
        ];
    
        // Using Query Builder
        $this->db->table('school_time')->insertBatch($data);
    }
}
