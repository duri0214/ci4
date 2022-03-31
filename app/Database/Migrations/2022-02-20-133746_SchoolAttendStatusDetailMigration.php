<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SchoolAttendStatusDetailMigration extends Migration
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
                'school_attend_status_id' => [
                    'type' => 'INT',
                    'unsigned' => true,
                    'comment' => '「欠席」などの出欠ステータス',
                ],
                'name' => [
                    'type' => 'VARCHAR',
                    'constraint' => '100',
                    'comment' => '欠席の「風邪」のように出欠ステータスの内訳',
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
        $this->forge->addForeignKey('school_id', 'school', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('school_attend_status_id', 'school_attend_status', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addUniqueKey(['school_id', 'school_attend_status_id', 'name']);
        $this->forge->createTable('school_attend_status_detail');
    }
    
    public function down()
    {
        $this->forge->dropTable('school_attend_status_detail');
    }
}
