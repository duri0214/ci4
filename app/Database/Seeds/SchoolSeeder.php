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
                'm_school_category_id' => 3,
                'school_corporation_id' => 1,
                'name' => 'デモ高等学校',
                'zipcode' => '000-0000',
                'address' => '東京都のどこかの住所',
                'tel' => '0000-00-0000',
                'prefecture' => '東京都',
                'code' => 'Demo',
                'remark' => 'デモ学校です'
            ],
        ];
    
        // Using Query Builder
        $this->db->table('school')->insertBatch($data);
    }
}
