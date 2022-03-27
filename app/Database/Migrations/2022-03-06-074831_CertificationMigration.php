<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CertificationMigration extends Migration
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
                'school_id' => [
                    'type' => 'INT',
                    'unsigned' => true,
                ],
                'm_certification_id' => [
                    'type' => 'INT',
                    'unsigned' => true,
                ],
                'name_short' => [
                    'type' => 'VARCHAR',
                    'constraint' => '100',
                ],
                'created_at datetime default current_timestamp',
                'updated_at datetime default null on update current_timestamp',
            ]
        );
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('school_id', 'school', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('m_certification_id', 'm_certification', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addUniqueKey(['school_id', 'm_certification_id']);
        $this->forge->createTable('certification');
    }
    
    public function down()
    {
        $this->forge->dropTable('certification');
    }
}
