<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SchoolUserMigration extends Migration
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
                'user_id' => [
                    'type' => 'INT',
                    'unsigned' => true,
                ],
                'has_superuser' => [
                    'type' => 'INT',
                    'unsigned' => true,
                    'comment' => '開発者用'
                ],
                'active' => [
                    'type' => 'INT',
                    'unsigned' => true,
                    'default' => 0,
                    'comment' => 'アクティブな学校（複数の学校を兼務していた場合）'
                ],
                'remark' => [
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                    'null' => true,
                    'comment' => '備考'
                ],
                'created_at datetime default current_timestamp',
                'updated_at datetime default null on update current_timestamp',
            ]
        );
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('school_id', 'school', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addUniqueKey(['user_id', 'school_id']);
        $this->forge->createTable('school_user');
    }

    public function down()
    {
        $this->forge->dropTable('school_user');
    }
}
