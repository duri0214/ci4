<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AttendSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'attend_date' => '2021-04-06',
                'remark' => '入学式欠席',
                'm_user_id' => 1,
                'm_homeroom_id' => 1,
                'lesson_id' => 1,
                'm_time_id' => 1,
                'm_attend_status_id' => 1,
                'm_attend_status_detail_id' => 1,
            ],
            [
                'id' => 2,
                'attend_date' => '2021-04-07',
                'remark' => '風邪欠席',
                'm_user_id' => 1,
                'm_homeroom_id' => 1,
                'lesson_id' => 4,
                'm_time_id' => 1,
                'm_attend_status_id' => 2,
                'm_attend_status_detail_id' => 2,
            ],
        ];
    
        // Using Query Builder
        $this->db->table('attend')->insertBatch($data);
    }
}
