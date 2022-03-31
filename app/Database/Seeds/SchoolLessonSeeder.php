<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SchoolLessonSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'school_homeroom_id' => 1,
                'school_sub_subject_id' => 4,
                'name' => '1年1組 入学式',
                'remark' => '入学おめでとうございます',
            ],
            [
                'id' => 2,
                'school_homeroom_id' => 2,
                'school_sub_subject_id' => 4,
                'name' => '1年2組 入学式',
                'remark' => '入学おめでとうございます',
            ],
            [
                'id' => 3,
                'school_homeroom_id' => 3,
                'school_sub_subject_id' => 4,
                'name' => '1年3組 入学式',
                'remark' => '入学おめでとうございます',
            ],
            [
                'id' => 4,
                'school_homeroom_id' => 1,
                'school_sub_subject_id' => 1,
                'name' => '1年1組 国語総合',
                'remark' => '国語を総合的に学びます',
            ],
            [
                'id' => 5,
                'school_homeroom_id' => 1,
                'school_sub_subject_id' => 2,
                'name' => '1年1組 数学Ⅰ',
                'remark' => '数学を単元にわけて学びます',
            ],
            [
                'id' => 6,
                'school_homeroom_id' => 1,
                'school_sub_subject_id' => 3,
                'name' => '1年1組 英語',
                'remark' => '国際化の時代にむけて学びます',
            ],

        ];
    
        // Using Query Builder
        $this->db->table('school_lesson')->insertBatch($data);
    }
}
