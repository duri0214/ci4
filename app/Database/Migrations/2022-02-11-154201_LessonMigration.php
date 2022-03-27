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
                'm_homeroom_id' => [
                    'type' => 'INT',
                    'unsigned' => true,
                ],
                'm_sub_subject_id' => [
                    'type' => 'INT',
                    'unsigned' => true,
                ],
                'name' => [
                    'type' => 'VARCHAR',
                    'constraint' => '100',
                ],
                'remark' => [
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                    'comment' => '備考',
                ],
                'created_at datetime default current_timestamp',
                'updated_at datetime default null on update current_timestamp',
            ]
        );
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('m_homeroom_id', 'm_homeroom', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('m_sub_subject_id', 'm_sub_subject', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addUniqueKey(['m_homeroom_id', 'm_sub_subject_id', 'name']);
        $this->forge->createTable('lesson');
    }
    
    public function down()
    {
        $this->forge->dropTable('lesson');
    }
}
