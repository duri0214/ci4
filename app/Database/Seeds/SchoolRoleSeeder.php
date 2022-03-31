<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SchoolRoleSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['id' => 1, 'school_id' => 1, 'name' => '管理者'],
            ['id' => 2, 'school_id' => 1, 'name' => '先生'],
            ['id' => 3, 'school_id' => 1, 'name' => '保護者'],
            ['id' => 4, 'school_id' => 1, 'name' => '生徒'],
            ['id' => 5, 'school_id' => 1, 'name' => '開発者'],
            ['id' => 6, 'school_id' => 1, 'name' => '非常勤'],
            ['id' => 7, 'school_id' => 1, 'name' => '事務']
        ];
        
        // Using Query Builder
        $this->db->table('school_role')->insertBatch($data);
    }
}
