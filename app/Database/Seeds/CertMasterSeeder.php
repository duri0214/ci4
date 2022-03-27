<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CertMasterSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['name' => '日本漢字能力検定１級'],
            ['name' => '日本漢字能力検定準１級'],
            ['name' => '日本漢字能力検定２級'],
            ['name' => '日本漢字能力検定準２級'],
            ['name' => '日本漢字能力検定３級'],
            ['name' => '日本漢字能力検定４級'],
            ['name' => '日本漢字能力検定５級'],
            ['name' => '日本漢字能力検定６級'],
            ['name' => '日本漢字能力検定７級'],
            ['name' => '日本漢字能力検定８級'],
            ['name' => '日本漢字能力検定９級'],
            ['name' => '日本漢字能力検定１０級'],
            ['name' => '日本語能力試験Ｎ１'],
            ['name' => '日本語能力試験Ｎ２'],
            ['name' => '日本語能力試験Ｎ３'],
            ['name' => '日本語能力試験Ｎ４'],
            ['name' => '日本語能力試験Ｎ５'],
            ['name' => '実用英語技能検定１級'],
            ['name' => '実用英語技能検定準１級'],
            ['name' => '実用英語技能検定２級'],
            ['name' => '実用英語技能検定準２級'],
            ['name' => '実用英語技能検定３級'],
            ['name' => '実用英語技能検定４級'],
            ['name' => '実用英語技能検定５級'],
            ['name' => 'ＴＥＡＰ'],
            ['name' => 'ＴＯＥＩＣ'],
            ['name' => 'ＴＯＦＥＬ'],
            ['name' => '基本情報技術者'],
            ['name' => 'ＩＴパスポート'],
            ['name' => 'マイクロソフトオフィススペシャリスト'],
            ['name' => '日商簿記検定１級'],
            ['name' => '日商簿記検定２級'],
            ['name' => '日商簿記検定３級'],
        ];
    
        // Using Query Builder
        $this->db->table('m_cert')->insertBatch($data);
    }
}
