<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class LessonMigration extends Migration
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
                'description' => [
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                ],
                'homeroom_id' => [
                    'type' => 'INT',
                    'unsigned' => true,
                ],
                'sub_subject_id' => [
                    'type' => 'INT',
                    'unsigned' => true,
                ],
                'created_at datetime default current_timestamp',
                'updated_at datetime default current_timestamp on update current_timestamp',
            ]
        );
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('homeroom_id', 'homeroom', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('sub_subject_id', 'sub_subject', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addUniqueKey(['homeroom_id', 'sub_subject_id', 'name']);
        $this->forge->createTable('lesson');
    }
    
    public function down()
    {
        $this->forge->dropTable('lesson');
    }
}
