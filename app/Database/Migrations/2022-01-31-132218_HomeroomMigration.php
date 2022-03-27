<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class HomeroomMigration extends Migration
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
                'm_school_id' => [
                    'type' => 'INT',
                    'unsigned' => true,
                ],
                'hr_grade' => [
                    'type' => 'INT',
                    'unsigned' => true,
                ],
                'hr_class' => [
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
        $this->forge->addForeignKey('m_school_id', 'm_school', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addUniqueKey(['m_school_id', 'hr_grade', 'hr_class', 'name']);
        $this->forge->createTable('m_homeroom');
    }
    
    public function down()
    {
        $this->forge->dropTable('m_homeroom');
    }
}
