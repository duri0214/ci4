<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AttendMigration extends Migration
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
                'm_user_id' => [
                    'type' => 'INT',
                    'unsigned' => true,
                ],
                'm_homeroom_id' => [
                    'type' => 'INT',
                    'unsigned' => true,
                    'null' => true,
                ],
                'lesson_id' => [
                    'type' => 'INT',
                    'unsigned' => true,
                    'null' => true,
                ],
                'm_time_id' => [
                    'type' => 'INT',
                    'unsigned' => true,
                ],
                'm_attend_status_id' => [
                    'type' => 'INT',
                    'unsigned' => true,
                ],
                'm_attend_status_detail_id' => [
                    'type' => 'INT',
                    'unsigned' => true,
                ],
                'attend_date' => [
                    'type' => 'DATE',
                    'comment' => 'いつ付という項目があることで、未来日出欠等にも対応できる',
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
        $this->forge->addForeignKey('m_user_id', 'm_user', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('m_homeroom_id', 'm_homeroom', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('lesson_id', 'lesson', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('m_time_id', 'm_time', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('m_attend_status_id', 'm_attend_status', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('m_attend_status_detail_id', 'm_attend_status_detail', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addUniqueKey(['m_user_id', 'm_homeroom_id', 'lesson_id', 'attendance_date', 'm_time_category_id']);
        $this->forge->createTable('attend');
    }

    public function down()
    {
        $this->forge->dropTable('attend');
    }
}
