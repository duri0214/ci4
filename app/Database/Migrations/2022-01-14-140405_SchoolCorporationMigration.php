<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SchoolCorporationMigration extends Migration
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
                    'constraint' => '50',
                    'comment' => '法人名'
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
        $this->forge->createTable('school_corporation');
    }
    
    public function down()
    {
        $this->forge->dropTable('school_corporation');
    }
}
