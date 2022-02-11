<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SchoolSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'name' => 'デモ高等学校',
                'zipcode' => '000-0000',
                'address' => '東京都のどこかの住所',
                'tel' => '0000-00-0000',
                'prefecture' => '東京都',
                'school_code' => 'Demo',
                'school_category_id' => 3
            ],
            [
                'id' => 2,
                'name' => '日本文理大学附属高等学校',
                'zipcode' => '876-0811',
                'address' => '大分県佐伯市鶴谷町２丁目１−１０',
                'tel' => '0972-22-3501',
                'prefecture' => '大分県',
                'school_code' => 'NihonBunri',
                'school_category_id' => 3
            ],
        ];
    
        // Using Query Builder
        $this->db->table('school')->insertBatch($data);
    }
}
