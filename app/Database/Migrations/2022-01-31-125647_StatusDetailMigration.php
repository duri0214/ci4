<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class StatusDetailMigration extends Migration
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
                'm_status_id' => [
                    'type' => 'INT',
                    'unsigned' => true,
                ],
                'created_at datetime default current_timestamp',
                'updated_at datetime default null on update current_timestamp',
            ]
        );
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('school_id', 'school', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey(
            'm_status_id',
            'm_status',
            'id',
            'CASCADE',
            'CASCADE'
        );
        $this->forge->addUniqueKey(['school_id', 'm_status_id', 'name']);
        $this->forge->createTable('m_status_detail');
    }
    
    public function down()
    {
        $this->forge->dropTable('m_status_detail');
    }
}
