<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SchoolLessonEvaluationMigration extends Migration
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
                ],
                'm_lesson_evaluation_id' => [
                    'type' => 'INT',
                    'unsigned' => true,
                    'comment' => '授業の評価セグメント',
                ],
                'remarks' => [
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                    'comment' => '備考',
                ],
                'created_at datetime default current_timestamp',
                'updated_at datetime default null on update current_timestamp',
            ]
        );
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('school_lesson_id', 'school_lesson', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('m_lesson_evaluation_id', 'm_lesson_evaluation', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addUniqueKey(['school_lesson_id', 'm_lesson_evaluation_id']);
        $this->forge->createTable('school_lesson_evaluation');
    }
    
    public function down()
    {
        $this->forge->dropTable('school_lesson_evaluation');
    }
}
