<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SchoolLessonItemSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'school_lesson_id' => 1,
                'school_lesson_item_segment_id' => 1,
            ],
            [
                'school_lesson_id' => 1,
                'school_lesson_item_segment_id' => 2,
            ],
            [
                'school_lesson_id' => 1,
                'school_lesson_item_segment_id' => 3,
            ],
            [
                'school_lesson_id' => 1,
                'school_lesson_item_segment_id' => 4,
            ],
            [
                'school_lesson_id' => 1,
                'school_lesson_item_segment_id' => 5,
            ],
            [
                'school_lesson_id' => 2,
                'school_lesson_item_segment_id' => 1,
            ],
            [
                'school_lesson_id' => 2,
                'school_lesson_item_segment_id' => 2,
            ],
            [
                'school_lesson_id' => 2,
                'school_lesson_item_segment_id' => 3,
            ],
            [
                'school_lesson_id' => 2,
                'school_lesson_item_segment_id' => 4,
            ],
            [
                'school_lesson_id' => 2,
                'school_lesson_item_segment_id' => 5,
            ],
            [
                'school_lesson_id' => 3,
                'school_lesson_item_segment_id' => 1,
            ],
            [
                'school_lesson_id' => 3,
                'school_lesson_item_segment_id' => 2,
            ],
            [
                'school_lesson_id' => 3,
                'school_lesson_item_segment_id' => 3,
            ],
            [
                'school_lesson_id' => 3,
                'school_lesson_item_segment_id' => 4,
            ],
            [
                'school_lesson_id' => 3,
                'school_lesson_item_segment_id' => 5,
            ],
        ];
    
        // Using Query Builder
        $this->db->table('school_lesson_item')->insertBatch($data);
    }
}
