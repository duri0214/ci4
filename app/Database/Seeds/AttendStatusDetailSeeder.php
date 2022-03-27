<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AttendStatusDetailSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'm_school_id' => 1,
                'm_attend_status_id' => 1,
                'name' => '出席のdetail',
            ],
            [
                'm_school_id' => 1,
                'm_attend_status_id' => 2,
                'name' => '欠席のdetail',
            ],
            [
                'm_school_id' => 1,
                'm_attend_status_id' => 3,
                'name' => '遅刻のdetail',
            ],
            [
                'm_school_id' => 1,
                'm_attend_status_id' => 4,
                'name' => '早退のdetail',
            ],
            [
                'm_school_id' => 1,
                'm_attend_status_id' => 5,
                'name' => '忌引のdetail',
            ],
            [
                'm_school_id' => 1,
                'm_attend_status_id' => 6,
                'name' => '出席停止のdetail',
            ],
            [
                'm_school_id' => 1,
                'm_attend_status_id' => 7,
                'name' => '公欠のdetail',
            ],
            [
                'm_school_id' => 1,
                'm_attend_status_id' => 8,
                'name' => '遅刻早退のdetail',
            ],
            [
                'm_school_id' => 1,
                'm_attend_status_id' => 9,
                'name' => '留学のdetail',
            ],
            [
                'm_school_id' => 1,
                'm_attend_status_id' => 10,
                'name' => '休学のdetail',
            ],
            [
                'm_school_id' => 1,
                'm_attend_status_id' => 11,
                'name' => '特認のdetail',
            ],
        ];
    
        // Using Query Builder
        $this->db->table('m_attend_status_detail')->insertBatch($data);
    }
}
