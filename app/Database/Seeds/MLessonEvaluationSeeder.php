<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MLessonEvaluationSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['id' => 1, 'school_id' => 1, 'name' => '素点'],
            ['id' => 2, 'school_id' => 1, 'name' => '平常点'],
            ['id' => 3, 'school_id' => 1, 'name' => '知識・技能'],
            ['id' => 4, 'school_id' => 1, 'name' => '思考・判断・表現'],
            ['id' => 5, 'school_id' => 1, 'name' => '主体的に学習に取り組む態度'],
            ['id' => 6, 'school_id' => 1, 'name' => '中間テスト'],
            ['id' => 7, 'school_id' => 1, 'name' => '期末テスト'],
        ];
        
        // Using Query Builder
        $this->db->table('m_lesson_evaluation')->insertBatch($data);
    }
}
