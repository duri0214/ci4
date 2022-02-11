<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class VocabularyBook extends Migration
{
    public function up()
    {
        $this->forge->addField(
            [
                'id' => [
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => true,
                    'auto_increment' => true,
                ],
                'sentence' => [
                    'type' => 'VARCHAR',
                    'constraint' => '200',
                    'null' => false,
                ],
                'created_at' => ['type' => 'datetime', 'null' => true],
                'updated_at' => ['type' => 'datetime', 'null' => true],
            ]
        );
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('vocabulary_book');
    }

    public function down()
    {
        $this->forge->dropTable('vocabulary_book');
    }
}
