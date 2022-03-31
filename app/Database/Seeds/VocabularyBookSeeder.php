<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class VocabularyBookSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['sentence' => 'I would like an aisle seat.'],
            ['sentence' => 'My son asked for a window seat.'],
            ['sentence' => 'They wrapped the baby in a soft blanket.'],
            ['sentence' => 'Can I see your boarding pass?'],
        ];
    
        // Using Query Builder
        $this->db->table('vocabulary_book')->insertBatch($data);
    }
}
