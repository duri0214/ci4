<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['name' => 'manager',],
            ['name' => 'teacher',],
            ['name' => 'parent',],
            ['name' => 'student',],
            ['name' => 'developer',],
        ];
    
        // Using Query Builder
        $this->db->table('user_role')->insertBatch($data);
    }
}
