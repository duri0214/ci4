<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SubSubjectMigration extends Migration
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
                'subject_id' => [
                    'type' => 'INT',
                    'unsigned' => true,
                ],
                'created_at datetime default current_timestamp',
                'updated_at datetime default null on update current_timestamp',
            ]
        );
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('subject_id', 'subject', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addUniqueKey(['subject_id', 'name']);
        $this->forge->createTable('sub_subject');
    }
    
    public function down()
    {
        $this->forge->dropTable('sub_subject');
    }
}
