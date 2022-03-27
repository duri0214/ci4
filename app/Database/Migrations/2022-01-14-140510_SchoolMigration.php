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
                'name' => [
                    'type' => 'VARCHAR',
                    'constraint' => '50',
                ],
                'zipcode' => [
                    'type' => 'VARCHAR',
                    'constraint' => '20',
                    'null' => true,
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
                ],
                'school_category_id' => [
                    'type' => 'INT',
                    'unsigned' => true,
                ],
                'created_at datetime default current_timestamp',
                'updated_at datetime default null on update current_timestamp',
            ]
        );
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('school_category_id', 'school_category', 'id');
        $this->forge->addUniqueKey('code');
        $this->forge->createTable('school');
    }

    public function down()
    {
        $this->forge->dropTable('school');
    }
}
