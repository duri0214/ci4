<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AttendanceSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'attendance_year' => '2021',
                'attendance_date' => '2021-04-06',
                'comment' => '入学式欠席',
                'user_id' => 1,
                'school_id' => 1,
                'homeroom_id' => 1,
                'm_time_id' => 1,
                'm_status_id' => 1,
                'm_status_detail_id' => 1,
            ],
            [
                'attendance_year' => '2021',
                'attendance_date' => '2021-04-07',
                'comment' => '風邪欠席',
                'user_id' => 1,
                'school_id' => 1,
                'homeroom_id' => 1,
                'm_time_id' => 1,
                'm_status_id' => 2,
                'm_status_detail_id' => 2,
            ],
        ];
    
        // Using Query Builder
        $this->db->table('attendance')->insertBatch($data);
    }
}
