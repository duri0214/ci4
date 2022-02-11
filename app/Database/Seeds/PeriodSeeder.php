<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PeriodSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => '1学期',
                'from_date' => '2021-04-01',
                'to_date' => '2021-06-30',
                'school_id' => 1
            ],
            [
                'name' => '2学期',
                'from_date' => '2021-07-01',
                'to_date' => '2021-10-31',
                'school_id' => 1
            ],
            [
                'name' => '3学期',
                'from_date' => '2021-11-01',
                'to_date' => '2022-03-30',
                'school_id' => 1
            ],
            [
                'name' => '1学期',
                'from_date' => '2021-04-01',
                'to_date' => '2021-06-30',
                'school_id' => 2
            ],
            [
                'name' => '2学期',
                'from_date' => '2021-07-01',
                'to_date' => '2021-10-31',
                'school_id' => 2
            ],
            [
                'name' => '3学期',
                'from_date' => '2021-11-01',
                'to_date' => '2022-03-30',
                'school_id' => 2
            ],
        ];
    
        // Using Query Builder
        $this->db->table('period')->insertBatch($data);
    }
}
