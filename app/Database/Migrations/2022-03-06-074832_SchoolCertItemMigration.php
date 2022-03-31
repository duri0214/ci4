<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SchoolCertItemMigration extends Migration
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
                'school_cert_id' => [
                    'type' => 'INT',
                    'unsigned' => true,
                ],
                'the_day_of_the_test' => [
                    'type' => 'DATE',
                    'null' => true,
                ],
                'remark' => [
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                    'comment' => '備考',
                ],
                'created_at datetime default current_timestamp',
                'updated_at datetime default null on update current_timestamp',
            ]
        );
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('school_cert_id', 'school_cert', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addUniqueKey(['school_cert_id', 'the_day_of_the_test']);
        $this->forge->createTable('school_cert_item');
    }
    
    public function down()
    {
        $this->forge->dropTable('school_cert_item');
    }
}
