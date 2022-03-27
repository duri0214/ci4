<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['id' => 1, 'sub_category' => 'school_category', 'name' => '小学校'],
            ['id' => 2, 'sub_category' => 'school_category', 'name' => '中学校'],
            ['id' => 3, 'sub_category' => 'school_category', 'name' => '高校'],
            ['id' => 4, 'sub_category' => 'lesson_items_segment', 'name' => '知識及び技能',],
            ['id' => 5, 'sub_category' => 'lesson_items_segment', 'name' => '思考力・判断力・表現力等',],
            ['id' => 6, 'sub_category' => 'lesson_items_segment', 'name' => '主体的に学習に取り組む態度',],
            ['id' => 7, 'sub_category' => 'user_role', 'name' => 'teacher_manager',],
            ['id' => 8, 'sub_category' => 'user_role', 'name' => 'teacher',],
            ['id' => 9, 'sub_category' => 'user_role', 'name' => 'parent',],
            ['id' => 10, 'sub_category' => 'user_role', 'name' => 'student',],
            ['id' => 11, 'sub_category' => 'user_role', 'name' => 'developer',],
        ];
    
        // Using Query Builder
        $this->db->table('m_category')->insertBatch($data);
    }
}
