<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SchoolSubSubjectMigration extends Migration
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
                'school_id' => [
                    'type' => 'INT',
                    'unsigned' => true,
                ],
                'school_subject_id' => [
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
        $this->forge->addForeignKey('school_subject_id', 'school_subject', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addUniqueKey(['school_subject_id', 'name']);
        $this->forge->createTable('school_sub_subject');
    }
    
    public function down()
    {
        $this->forge->dropTable('school_sub_subject');
    }
}
