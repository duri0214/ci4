<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class LessonTeacherSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'lesson_id' => 1,
                'teacher_id' => 1,
            ],
            [
                'lesson_id' => 2,
                'teacher_id' => 1,
            ],
            [
                'lesson_id' => 3,
                'teacher_id' => 1,
            ],
            [
                'lesson_id' => 1,
                'teacher_id' => 2,
            ],
            [
                'lesson_id' => 2,
                'teacher_id' => 2,
            ],
            [
                'lesson_id' => 3,
                'teacher_id' => 2,
            ],
        ];
    
        // Using Query Builder
        $this->db->table('lesson_teacher')->insertBatch($data);
    }
}
