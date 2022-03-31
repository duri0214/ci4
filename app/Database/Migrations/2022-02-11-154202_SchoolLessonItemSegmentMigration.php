<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SchoolLessonItemSegmentMigration extends Migration
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
                'name' => [
                    'type' => 'VARCHAR',
                    'constraint' => '100',
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
        $this->forge->addUniqueKey(['school_lesson_id', 'name']);
        $this->forge->createTable('school_lesson_item_segment');
    }
    
    public function down()
    {
        $this->forge->dropTable('school_lesson_item_segment');
    }
}
