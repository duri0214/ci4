<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MSchoolCategoryMigration extends Migration
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
        $this->forge->addUniqueKey('name');
        $this->forge->createTable('m_school_category');
    }
    
    public function down()
    {
        $this->forge->dropTable('m_school_category');
    }
}
