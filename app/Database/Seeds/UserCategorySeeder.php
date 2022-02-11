<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserCategorySeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['name' => 'teacher',],
            ['name' => 'parent',],
            ['name' => 'student',],
            ['name' => 'developer',],
        ];
    
        // Using Query Builder
        $this->db->table('user_category')->insertBatch($data);
    }
}
