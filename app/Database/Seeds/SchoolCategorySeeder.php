<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SchoolCategorySeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['name' => '小学校'],
            ['name' => '中学校'],
            ['name' => '高校'],
        ];
    
        // Using Query Builder
        $this->db->table('school_category')->insertBatch($data);
    }
}
