<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class LessonTeacherMigration extends Migration
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
                'lesson_id' => [
                    'type' => 'INT',
                    'unsigned' => true,
                    'null' => true,
                ],
                'm_teacher_id' => [
                    'type' => 'INT',
                    'unsigned' => true,
                    'null' => true,
                ],
                'created_at datetime default current_timestamp',
                'updated_at datetime default null on update current_timestamp',
            ]
        );
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('lesson_id', 'lesson', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('m_teacher_id', 'm_teacher', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addUniqueKey(['lesson_id', 'm_teacher_id']);
        $this->forge->createTable('lesson_teacher');
    }
    
    public function down()
    {
        $this->forge->dropTable('lesson_teacher');
    }
}
