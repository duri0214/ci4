<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AttendanceMigration extends Migration
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
                'attendance_year' => [
                    'type' => 'VARCHAR',
                    'constraint' => 4,
                ],
                'attendance_date' => [
                    'type' => 'DATE',
                ],
                'comment' => [
                    'type' => 'VARCHAR',
                    'constraint' => '200',
                    'null' => true,
                ],
                'user_id' => [
                    'type' => 'INT',
                    'unsigned' => true,
                ],
                'homeroom_id' => [
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
                'm_status_id' => [
                    'type' => 'INT',
                    'unsigned' => true,
                ],
                'm_status_detail_id' => [
                    'type' => 'INT',
                    'unsigned' => true,
                ],
                'created_at datetime default current_timestamp',
                'updated_at datetime default current_timestamp on update current_timestamp',
            ]
        );
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('user_id', 'user', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('homeroom_id', 'homeroom', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('lesson_id', 'lesson', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey(
            'm_time_id',
            'm_time',
            'id',
            'CASCADE',
            'CASCADE'
        );
        $this->forge->addForeignKey(
            'm_status_id',
            'm_status',
            'id',
            'CASCADE',
            'CASCADE'
        );
        $this->forge->addForeignKey(
            'm_status_detail_id',
            'm_status_detail',
            'id',
            'CASCADE',
            'CASCADE'
        );
        $this->forge->addUniqueKey([
            'user_id',
            'homeroom_id',
            'lesson_id',
            'attendance_date',
            'm_time_category_id'
        ]);
        $this->forge->createTable('attendance');
    }

    public function down()
    {
        $this->forge->dropTable('attendance');
    }
}
