<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SchoolUserRoleMigration extends Migration
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
                'school_role_id' => [
                    'type' => 'INT',
                    'unsigned' => true,
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
        $this->forge->addForeignKey('school_user_id', 'school_user', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('school_role_id', 'school_role', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addUniqueKey(['school_user_id', 'school_role_id']);
        $this->forge->createTable('school_user_role');
    }
    
    public function down()
    {
        $this->forge->dropTable('school_user_role');
    }
}
