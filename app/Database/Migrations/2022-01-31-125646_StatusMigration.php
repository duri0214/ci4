<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class StatusMigration extends Migration
{
    public function up()
    {
        $this->forge->addField(
            [
                'id' => [
                    'type' => 'INT',
                    'unsigned' => true,
                    'auto_increment' => true,
                ],
                'name' => [
                    'type' => 'VARCHAR',
                    'constraint' => '100',
                ],
                'school_id' => [
                    'type' => 'INT',
                    'unsigned' => true,
                ],
                'created_at datetime default current_timestamp',
                'updated_at datetime default null on update current_timestamp',
            ]
        );
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('school_id', 'school', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addUniqueKey(['school_id', 'name']);
        $this->forge->createTable('m_status');
    }
    
    public function down()
    {
        $this->forge->dropTable('m_status');
    }
}
