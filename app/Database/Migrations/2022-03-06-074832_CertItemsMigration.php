<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CertItemsMigration extends Migration
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
                'cert_id' => [
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
        $this->forge->addForeignKey('cert_id', 'cert', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addUniqueKey(['cert_id', 'the_day_of_the_test']);
        $this->forge->createTable('cert_items');
    }
    
    public function down()
    {
        $this->forge->dropTable('cert_items');
    }
}
