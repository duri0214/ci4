<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class LessonItemsMigration extends Migration
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
                ],
                'm_category_id' => [
                    'type' => 'INT',
                    'unsigned' => true,
                    'comment' => '授業の評価セグメント',
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
        $this->forge->addForeignKey('lesson_id', 'lesson', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('m_category_id', 'm_category', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addUniqueKey(['lesson_id', 'lesson_item_segment_id']);
        $this->forge->createTable('lesson_items');
    }
    
    public function down()
    {
        $this->forge->dropTable('lesson_items');
    }
}
