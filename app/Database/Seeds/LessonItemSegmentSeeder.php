<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class LessonItemSegmentSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'name' => '知識及び技能',
            ],
            [
                'id' => 2,
                'name' => '思考力・判断力・表現力等',
            ],
            [
                'id' => 3,
                'name' => '主体的に学習に取り組む態度',
            ],
        ];
    
        // Using Query Builder
        $this->db->table('lesson_item_segment')->insertBatch($data);
    }
}
