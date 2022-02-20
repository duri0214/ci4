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
                'name' => [
                    'type' => 'VARCHAR',
                    'constraint' => '100',
                ],
                'user_id' => [
                    'type' => 'INT',
                    'unsigned' => true,
                ],
                'created_at datetime default current_timestamp',
                'updated_at datetime default current_timestamp on update current_timestamp',
            ]
        );
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('user_id', 'user', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addUniqueKey(['user_id', 'name']);
        $this->forge->createTable('teacher');
    }
    
    public function down()
    {
        $this->forge->dropTable('teacher');
    }
}
