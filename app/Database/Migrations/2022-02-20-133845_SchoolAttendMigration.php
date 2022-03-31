<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SchoolAttendMigration extends Migration
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
                'school_user_id' => [
                    'type' => 'INT',
                    'unsigned' => true,
                ],
                'attend_date' => [
                    'type' => 'DATE',
                    'comment' => 'いつ付という項目があることで、未来日出欠等にも対応できる',
                ],
                'school_time_id' => [
                    'type' => 'INT',
                    'unsigned' => true,
                ],
                'school_attend_status_id' => [
                    'type' => 'INT',
                    'unsigned' => true,
                ],
                'school_attend_status_detail_id' => [
                    'type' => 'INT',
                    'unsigned' => true,
                ],
                'remark' => [
                    'type' => 'VARCHAR',
                    'constraint' => '200',
                    'null' => true,
                    'comment' => '備考',
                ],
                'created_at datetime default current_timestamp',
                'updated_at datetime default null on update current_timestamp',
            ]
        );
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('school_user_id', 'school_user', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('school_time_id', 'school_time', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('school_attend_status_id', 'school_attend_status', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('school_attend_status_detail_id', 'school_attend_status_detail', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addUniqueKey(['school_user_id', 'attend_date', 'school_time_id']);
        $this->forge->createTable('school_attend');
    }

    public function down()
    {
        $this->forge->dropTable('school_attend');
    }
}
