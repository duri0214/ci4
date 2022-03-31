<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SchoolLessonItemSegmentSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'school_lesson_id' => 4,
                'name' => '知識・技能',
            ],
            [
                'id' => 2,
                'school_lesson_id' => 4,
                'name' => '思考・判断・表現',
            ],
            [
                'id' => 3,
                'school_lesson_id' => 4,
                'name' => '主体的に学習に取り組む態度',
            ],
            [
                'id' => 4,
                'school_lesson_id' => 4,
                'name' => '中間テスト',
            ],
            [
                'id' => 5,
                'school_lesson_id' => 4,
                'name' => '期末テスト',
            ],
        ];
    
        // Using Query Builder
        $this->db->table('school_lesson_item_segment')->insertBatch($data);
    }
}
