<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SchoolAttendSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'school_user_id' => 1,
                'school_lesson_id' => 1,
                'attend_date' => '2021-04-06',
                'school_time_id' => 1,
                'school_attend_status_id' => 1,
                'school_attend_status_detail_id' => 1,
                'remark' => '入学式欠席',
            ],
            [
                'id' => 2,
                'school_user_id' => 1,
                'school_lesson_id' => 4,
                'attend_date' => '2021-04-07',
                'school_time_id' => 1,
                'school_attend_status_id' => 2,
                'school_attend_status_detail_id' => 2,
                'remark' => '風邪欠席',
            ],
        ];
    
        // Using Query Builder
        $this->db->table('school_attend')->insertBatch($data);
    }
}
