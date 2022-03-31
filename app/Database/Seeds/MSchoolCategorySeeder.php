<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MSchoolCategorySeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['id' => 1, 'name' => '小学校'],
            ['id' => 2, 'name' => '中学校'],
            ['id' => 3, 'name' => '高校'],
        ];
        
        // Using Query Builder
        $this->db->table('m_school_category')->insertBatch($data);
    }
}
