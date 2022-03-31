<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SchoolAttendStatusDetailSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'school_id' => 1,
                'school_attend_status_id' => 1,
                'name' => '出席のdetail',
            ],
            [
                'school_id' => 1,
                'school_attend_status_id' => 2,
                'name' => '欠席のdetail',
            ],
            [
                'school_id' => 1,
                'school_attend_status_id' => 3,
                'name' => '遅刻のdetail',
            ],
            [
                'school_id' => 1,
                'school_attend_status_id' => 4,
                'name' => '早退のdetail',
            ],
            [
                'school_id' => 1,
                'school_attend_status_id' => 5,
                'name' => '忌引のdetail',
            ],
            [
                'school_id' => 1,
                'school_attend_status_id' => 6,
                'name' => '出席停止のdetail',
            ],
            [
                'school_id' => 1,
                'school_attend_status_id' => 7,
                'name' => '公欠のdetail',
            ],
            [
                'school_id' => 1,
                'school_attend_status_id' => 8,
                'name' => '遅刻早退のdetail',
            ],
            [
                'school_id' => 1,
                'school_attend_status_id' => 9,
                'name' => '留学のdetail',
            ],
            [
                'school_id' => 1,
                'school_attend_status_id' => 10,
                'name' => '休学のdetail',
            ],
            [
                'school_id' => 1,
                'school_attend_status_id' => 11,
                'name' => '特認のdetail',
            ],
        ];
    
        // Using Query Builder
        $this->db->table('school_attend_status_detail')->insertBatch($data);
    }
}
