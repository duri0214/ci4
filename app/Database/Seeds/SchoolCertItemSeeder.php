<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SchoolCertItemSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['id' => 1, 'school_cert_id' => 1, 'the_day_of_the_test' => '2022-04-30'],
            ['id' => 2, 'school_cert_id' => 1, 'the_day_of_the_test' => '2022-08-30'],
            ['id' => 3, 'school_cert_id' => 1, 'the_day_of_the_test' => '2022-12-30'],

        ];
    
        // Using Query Builder
        $this->db->table('school_cert_item')->insertBatch($data);
    }
}
