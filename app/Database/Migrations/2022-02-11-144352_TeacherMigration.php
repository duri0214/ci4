<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TeacherMigration extends Migration
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
                'm_user_id' => [
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
        $this->forge->addForeignKey('m_user_id', 'm_user', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addUniqueKey(['m_user_id', 'name']);
        $this->forge->createTable('m_teacher');
    }
    
    public function down()
    {
        $this->forge->dropTable('m_teacher');
    }
}
