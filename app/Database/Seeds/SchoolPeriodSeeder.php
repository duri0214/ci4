<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SchoolPeriodSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'school_id' => 1,
                'school_curriculum_id' => 1,
                'name' => '1学期',
                'from_date' => '2022-04-01',
                'to_date' => '2022-06-30',
            ],
            [
                'id' => 2,
                'school_id' => 1,
                'school_curriculum_id' => 1,
                'name' => '2学期',
                'from_date' => '2022-07-01',
                'to_date' => '2022-10-31',
            ],
            [
                'id' => 3,
                'school_id' => 1,
                'school_curriculum_id' => 1,
                'name' => '3学期',
                'from_date' => '2022-11-01',
                'to_date' => '2023-03-31',
            ],
            [
                'id' => 4,
                'school_id' => 1,
                'school_curriculum_id' => 2,
                'name' => '前期',
                'from_date' => '2022-04-01',
                'to_date' => '2022-09-30',
            ],
            [
                'id' => 5,
                'school_id' => 1,
                'school_curriculum_id' => 2,
                'name' => '後期',
                'from_date' => '2022-10-01',
                'to_date' => '2023-03-31',
            ],
            [
                'id' => 6,
                'school_id' => 1,
                'school_curriculum_id' => 3,
                'name' => '前期',
                'from_date' => '2022-04-01',
                'to_date' => '2022-10-31',
            ],
            [
                'id' => 7,
                'school_id' => 1,
                'school_curriculum_id' => 3,
                'name' => '後期',
                'from_date' => '2022-11-01',
                'to_date' => '2023-03-31',
            ],
        ];
    
        // Using Query Builder
        $this->db->table('school_period')->insertBatch($data);
    }
}
