<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SchoolLessonMemberSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'school_lesson_id' => 4,
                'school_user_id' => 1,
            ],
            [
                'school_lesson_id' => 4,
                'school_user_id' => 3,
            ],
            [
                'school_lesson_id' => 4,
                'school_user_id' => 4,
            ],
            [
                'school_lesson_id' => 4,
                'school_user_id' => 5,
            ],
            [
                'school_lesson_id' => 5,
                'school_user_id' => 1,
            ],
            [
                'school_lesson_id' => 5,
                'school_user_id' => 3,
            ],
            [
                'school_lesson_id' => 5,
                'school_user_id' => 4,
            ],
            [
                'school_lesson_id' => 5,
                'school_user_id' => 5,
            ],
            [
                'school_lesson_id' => 6,
                'school_user_id' => 1,
            ],
            [
                'school_lesson_id' => 6,
                'school_user_id' => 3,
            ],
            [
                'school_lesson_id' => 6,
                'school_user_id' => 4,
            ],
            [
                'school_lesson_id' => 6,
                'school_user_id' => 5,
            ],

        ];
    
        // Using Query Builder
        $this->db->table('school_lesson_member')->insertBatch($data);
    }
}
