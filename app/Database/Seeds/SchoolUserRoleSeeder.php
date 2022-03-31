<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SchoolUserRoleSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'school_user_id' => 1,
                'school_role_id' => 1,
            ],
            [
                'school_user_id' => 1,
                'school_role_id' => 2,
            ],
            [
                'school_user_id' => 2,
                'school_role_id' => 2,
            ],
            [
                'school_user_id' => 2,
                'school_role_id' => 6,
            ],
            [
                'school_user_id' => 3,
                'school_role_id' => 4,
            ],
            [
                'school_user_id' => 4,
                'school_role_id' => 4,
            ],
            [
                'school_user_id' => 5,
                'school_role_id' => 4,
            ],

        ];
    
        // Using Query Builder
        $this->db->table('school_user_role')->insertBatch($data);
    }
}
