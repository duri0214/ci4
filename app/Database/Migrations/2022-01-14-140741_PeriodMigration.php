<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Period extends Migration
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
                ],
                'from_date' => [
                    'type' => 'date',
                    'default' => '0000-00-00',
                ],
                'to_date' => [
                    'type' => 'date',
                    'default' => '0000-00-00',
                ],
                'school_id' => [
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => true,
                ],
                'created_at' => ['type' => 'datetime', 'null' => true],
                'updated_at' => ['type' => 'datetime', 'null' => true],
            ]
        );
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('school_id', 'school', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('period');
    }

    public function down()
    {
        $this->forge->dropTable('period');
    }
}
