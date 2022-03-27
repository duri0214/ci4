<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CertificationItemsMigration extends Migration
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
                'certification_id' => [
                    'type' => 'INT',
                    'unsigned' => true,
                ],
                'the_day_of_the_test' => [
                    'type' => 'DATE',
                    'null' => true,
                ],
                'created_at datetime default current_timestamp',
                'updated_at datetime default null on update current_timestamp',
            ]
        );
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('certification_id', 'certification', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addUniqueKey(['certification_id', 'the_day_of_the_test']);
        $this->forge->createTable('certification_items');
    }
    
    public function down()
    {
        $this->forge->dropTable('certification_items');
    }
}
