<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SchoolCategory extends Migration
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
                'name' => [
                    'type' => 'VARCHAR',
                    'constraint' => '50',
                    'null' => false,
                ],
                'created_at' => ['type' => 'datetime', 'null' => true],
                'updated_at' => ['type' => 'datetime', 'null' => true],
            ]
        );
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('school_category');
    }

    public function down()
    {
        $this->forge->dropTable('school_category');
    }
}
