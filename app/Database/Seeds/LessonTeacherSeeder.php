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
                'm_teacher_id' => 1,
            ],
            [
                'lesson_id' => 2,
                'm_teacher_id' => 1,
            ],
            [
                'lesson_id' => 3,
                'm_teacher_id' => 1,
            ],
            [
                'lesson_id' => 1,
                'm_teacher_id' => 2,
            ],
            [
                'lesson_id' => 2,
                'm_teacher_id' => 2,
            ],
            [
                'lesson_id' => 3,
                'm_teacher_id' => 2,
            ],
        ];
    
        // Using Query Builder
        $this->db->table('lesson_teacher')->insertBatch($data);
    }
}
