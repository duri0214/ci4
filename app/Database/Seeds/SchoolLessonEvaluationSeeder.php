<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SchoolLessonEvaluationSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'school_lesson_id' => 1,
                'm_lesson_evaluation_id' => 2,
            ],
            [
                'school_lesson_id' => 2,
                'm_lesson_evaluation_id' => 2,
            ],
            [
                'school_lesson_id' => 3,
                'm_lesson_evaluation_id' => 2,
            ],
            [
                'school_lesson_id' => 4,
                'm_lesson_evaluation_id' => 3,
            ],
            [
                'school_lesson_id' => 4,
                'm_lesson_evaluation_id' => 4,
            ],
            [
                'school_lesson_id' => 4,
                'm_lesson_evaluation_id' => 5,
            ],
            [
                'school_lesson_id' => 4,
                'm_lesson_evaluation_id' => 6,
            ],
            [
                'school_lesson_id' => 4,
                'm_lesson_evaluation_id' => 7,
            ],
            [
                'school_lesson_id' => 5,
                'm_lesson_evaluation_id' => 3,
            ],
            [
                'school_lesson_id' => 5,
                'm_lesson_evaluation_id' => 4,
            ],
            [
                'school_lesson_id' => 5,
                'm_lesson_evaluation_id' => 5,
            ],
            [
                'school_lesson_id' => 5,
                'm_lesson_evaluation_id' => 6,
            ],
            [
                'school_lesson_id' => 5,
                'm_lesson_evaluation_id' => 7,
            ],
            [
                'school_lesson_id' => 6,
                'm_lesson_evaluation_id' => 3,
            ],
            [
                'school_lesson_id' => 6,
                'm_lesson_evaluation_id' => 4,
            ],
            [
                'school_lesson_id' => 6,
                'm_lesson_evaluation_id' => 5,
            ],
            [
                'school_lesson_id' => 6,
                'm_lesson_evaluation_id' => 6,
            ],
            [
                'school_lesson_id' => 6,
                'm_lesson_evaluation_id' => 7,
            ],
        ];
    
        // Using Query Builder
        $this->db->table('school_lesson_evaluation')->insertBatch($data);
    }
}
