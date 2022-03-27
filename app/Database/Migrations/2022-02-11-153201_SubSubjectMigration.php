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
                'm_subject_id' => [
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
        $this->forge->addForeignKey('m_subject_id', 'm_subject', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addUniqueKey(['m_subject_id', 'name']);
        $this->forge->createTable('m_sub_subject');
    }
    
    public function down()
    {
        $this->forge->dropTable('m_sub_subject');
    }
}
