<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class LessonSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'name' => '1年1組入学式',
                'description' => '入学おめでとうございます',
                'homeroom_id' => 1,
                'sub_subject_id' => 4
            ],
            [
                'id' => 2,
                'name' => '1年2組入学式',
                'description' => '入学おめでとうございます',
                'homeroom_id' => 2,
                'sub_subject_id' => 4
            ],
            [
                'id' => 3,
                'name' => '1年3組入学式',
                'description' => '入学おめでとうございます',
                'homeroom_id' => 3,
                'sub_subject_id' => 4
            ],
            [
                'id' => 4,
                'name' => '1年1組 国語総合',
                'description' => '国語を総合的に学びます',
                'homeroom_id' => 1,
                'sub_subject_id' => 1
            ],
            [
                'id' => 5,
                'name' => '1年1組 数学Ⅰ',
                'description' => '数学を単元にわけて学びます',
                'homeroom_id' => 1,
                'sub_subject_id' => 2
            ],
            [
                'id' => 6,
                'name' => '1年1組 英語',
                'description' => '国際化の時代にむけて学びます',
                'homeroom_id' => 1,
                'sub_subject_id' => 3
            ],

        ];
    
        // Using Query Builder
        $this->db->table('lesson')->insertBatch($data);
    }
}
