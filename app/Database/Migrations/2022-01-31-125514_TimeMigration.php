<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TimeMigration extends Migration
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
                'm_school_id' => [
                    'type' => 'INT',
                    'unsigned' => true,
                ],
                'name' => [
                    'type' => 'VARCHAR',
                    'constraint' => '100',
                ],
                'created_at datetime default current_timestamp',
                'updated_at datetime default null on update current_timestamp',
            ]
        );
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('m_school_id', 'm_school', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addUniqueKey(['m_school_id', 'name']);
        $this->forge->createTable('m_time');
    }
    
    public function down()
    {
        $this->forge->dropTable('m_time');
    }
}
