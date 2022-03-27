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
                'm_category_id' => [
                    'type' => 'INT',
                    'unsigned' => true,
                    'comment' => '先生-Manager、先生-Normal、生徒、保護者など「種」「ロール」で使い分ける'
                ],
                'name' => [
                    'type' => 'VARCHAR',
                    'constraint' => '100',
                ],
                'email' => [
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                ],
                'created_at datetime default current_timestamp',
                'updated_at datetime default null on update current_timestamp',
            ]
        );
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('m_category_id', 'm_category', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addUniqueKey('email');
        $this->forge->createTable('m_user');
    }

    public function down()
    {
        $this->forge->dropTable('m_user');
    }
}
