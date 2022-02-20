<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserMigration extends Migration
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
                'name' => [
                    'type' => 'VARCHAR',
                    'constraint' => '100',
                ],
                'email' => [
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                ],
                'user_category_id' => [
                    'type' => 'INT',
                    'unsigned' => true,
                    'COMMENT' => '先生、生徒、保護者など'
                ],
                'user_role_id' => [
                    'type' => 'INT',
                    'unsigned' => true,
                    'COMMENT' => 'Managerなどの権限（categoryの内訳）'
                ],
                'created_at datetime default current_timestamp',
                'updated_at datetime default current_timestamp on update current_timestamp',
            ]
        );
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('user_category_id', 'user_category', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('user_role_id', 'user_role', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addUniqueKey('email');
        $this->forge->createTable('user');
    }

    public function down()
    {
        $this->forge->dropTable('user');
    }
}
