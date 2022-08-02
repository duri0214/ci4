<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SchoolCertSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['id' => 1, 'school_id' => 1, 'name' => '日本漢字能力検定１級', '備考あああ'],
            ['id' => 2, 'school_id' => 1, 'name' => '日本漢字能力検定準１級', '備考ああい'],
            ['id' => 3, 'school_id' => 1, 'name' => '日本漢字能力検定２級', '備考ああう'],
            ['id' => 4, 'school_id' => 1, 'name' => '日本漢字能力検定準２級', '備考ああえ'],
            ['id' => 5, 'school_id' => 1, 'name' => '日本漢字能力検定３級', '備考ああお'],
            ['id' => 6, 'school_id' => 1, 'name' => '日本漢字能力検定４級'],
            ['id' => 7, 'school_id' => 1, 'name' => '日本漢字能力検定５級'],
            ['id' => 8, 'school_id' => 1, 'name' => '日本漢字能力検定６級'],
            ['id' => 9, 'school_id' => 1, 'name' => '日本漢字能力検定７級'],
            ['id' => 10, 'school_id' => 1, 'name' => '日本漢字能力検定８級'],
            ['id' => 11, 'school_id' => 1, 'name' => '日本漢字能力検定９級'],
            ['id' => 12, 'school_id' => 1, 'name' => '日本漢字能力検定１０級'],
            ['id' => 13, 'school_id' => 1, 'name' => '日本語能力試験Ｎ１'],
            ['id' => 14, 'school_id' => 1, 'name' => '日本語能力試験Ｎ２'],
            ['id' => 15, 'school_id' => 1, 'name' => '日本語能力試験Ｎ３'],
            ['id' => 16, 'school_id' => 1, 'name' => '日本語能力試験Ｎ４'],
            ['id' => 17, 'school_id' => 1, 'name' => '日本語能力試験Ｎ５'],
            ['id' => 18, 'school_id' => 1, 'name' => '実用英語技能検定１級'],
            ['id' => 19, 'school_id' => 1, 'name' => '実用英語技能検定準１級'],
            ['id' => 20, 'school_id' => 1, 'name' => '実用英語技能検定２級'],
            ['id' => 21, 'school_id' => 1, 'name' => '実用英語技能検定準２級'],
            ['id' => 22, 'school_id' => 1, 'name' => '実用英語技能検定３級'],
            ['id' => 23, 'school_id' => 1, 'name' => '実用英語技能検定４級'],
            ['id' => 24, 'school_id' => 1, 'name' => '実用英語技能検定５級'],
            ['id' => 25, 'school_id' => 1, 'name' => 'ＴＥＡＰ'],
            ['id' => 26, 'school_id' => 1, 'name' => 'ＴＯＥＩＣ'],
            ['id' => 27, 'school_id' => 1, 'name' => 'ＴＯＦＥＬ'],
            ['id' => 28, 'school_id' => 1, 'name' => '基本情報技術者'],
            ['id' => 29, 'school_id' => 1, 'name' => 'ＩＴパスポート'],
            ['id' => 30, 'school_id' => 1, 'name' => 'マイクロソフトオフィススペシャリスト'],
            ['id' => 31, 'school_id' => 1, 'name' => '日商簿記検定１級'],
            ['id' => 32, 'school_id' => 1, 'name' => '日商簿記検定２級'],
            ['id' => 33, 'school_id' => 1, 'name' => '日商簿記検定３級'],
        ];
    
        // Using Query Builder
        $this->db->table('school_cert')->insertBatch($data);
    }
}
