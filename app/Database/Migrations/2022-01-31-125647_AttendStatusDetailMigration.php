<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AttendStatusDetailMigration extends Migration
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
                'm_attend_status_id' => [
                    'type' => 'INT',
                    'unsigned' => true,
                    'comment' => '「欠席」などの出欠ステータス',
                ],
                'name' => [
                    'type' => 'VARCHAR',
                    'constraint' => '100',
                    'comment' => '「欠席」の「風邪」のように出欠ステータスの内訳',
                ],
                'created_at datetime default current_timestamp',
                'updated_at datetime default null on update current_timestamp',
            ]
        );
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('m_school_id', 'm_school', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('m_attend_status_id', 'm_attend_status', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addUniqueKey(['m_school_id', 'm_attend_status_id', 'name']);
        $this->forge->createTable('m_attend_status_detail');
    }
    
    public function down()
    {
        $this->forge->dropTable('m_attend_status_detail');
    }
}
