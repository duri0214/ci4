<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SchoolMigration extends Migration
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
                'm_school_category_id' => [
                    'type' => 'INT',
                    'unsigned' => true,
                    'comment' => '「中学」「高校」などの学校カテゴリー',
                ],
                'school_corporation_id' => [
                    'type' => 'INT',
                    'unsigned' => true,
                    'comment' => '法人名',
                ],
                'name' => [
                    'type' => 'VARCHAR',
                    'constraint' => '50',
                    'comment' => '学校名',
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
                    'constraint' => '200',
                    'comment' => '学校のコード名。ファイル名の元'
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
        $this->forge->addForeignKey('m_school_category_id', 'm_school_category', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('school_corporation_id', 'school_corporation', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addUniqueKey('code');
        $this->forge->createTable('school');
    }

    public function down()
    {
        $this->forge->dropTable('school');
    }
}
