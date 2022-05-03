<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SchoolCorporationSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'name' => '学校法人デモ学園',
            ],
        ];
        
        // Using Query Builder
        $this->db->table('school_corporation')->insertBatch($data);
    }
}
