<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class School extends Migration
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
                    'comment' => '「中学」「高校」など、学校カテゴリー',
                ],
                'name' => [
                    'type' => 'VARCHAR',
                    'constraint' => '50',
                ],
                'zipcode' => [
                    'type' => 'VARCHAR',
                    'constraint' => '20',
                    'null' => true,
                    'comment' => '郵便番号',
                ],
                'address' => [
                    'type' => 'VARCHAR',
                    'constraint' => '200',
                    'null' => true,
                ],
                'tel' => [
                    'type' => 'VARCHAR',
                    'constraint' => '20',
                    'null' => true,
                ],
                'prefecture' => [
                    'type' => 'VARCHAR',
                    'constraint' => '20',
                    'null' => true,
                ],
                'code' => [
                    'type' => 'VARCHAR',
                    'constraint' => '50',
                    'null' => true,
                    'comment' => 'デモ学校は「demo」など、プログラムで内部的に使う用のコードネーム',
                ],
                'created_at datetime default current_timestamp',
                'updated_at datetime default null on update current_timestamp',
            ]
        );
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('m_category_id', 'm_category', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addUniqueKey('code');
        $this->forge->createTable('m_school');
    }

    public function down()
    {
        $this->forge->dropTable('m_school');
    }
}
