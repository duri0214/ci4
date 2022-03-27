<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Category extends Migration
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
                'sub_category' => [
                    'type' => 'VARCHAR',
                    'constraint' => '50',
                    'comment' => '「school」や「lesson」など、抽出時のキーワード',
                ],
                'name' => [
                    'type' => 'VARCHAR',
                    'constraint' => '50',
                ],
                'remark' => [
                    'type' => 'VARCHAR',
                    'constraint' => '50',
                    'null' => true,
                    'comment' => '備考'
                ],
                'created_at datetime default current_timestamp',
                'updated_at datetime default null on update current_timestamp',
            ]
        );
        $this->forge->addPrimaryKey('id');
        $this->forge->addUniqueKey('name');
        $this->forge->createTable('m_category');
    }

    public function down()
    {
        $this->forge->dropTable('school_category');
    }
}
