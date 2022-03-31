<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SchoolLessonMemberMigration extends Migration
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
                'school_lesson_id' => [
                    'type' => 'INT',
                    'unsigned' => true,
                    'null' => true,
                ],
                'school_user_id' => [
                    'type' => 'INT',
                    'unsigned' => true,
                    'null' => true,
                    'comment' => '先生も生徒もメンバーとして入ります',
                ],
                'created_at datetime default current_timestamp',
                'updated_at datetime default null on update current_timestamp',
            ]
        );
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('school_lesson_id', 'school_lesson', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('school_user_id', 'school_user', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addUniqueKey(['school_lesson_id', 'school_user_id']);
        $this->forge->createTable('school_lesson_member');
    }
    
    public function down()
    {
        $this->forge->dropTable('school_lesson_member');
    }
}
