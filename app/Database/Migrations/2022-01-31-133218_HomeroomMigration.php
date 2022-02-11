<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class HomeroomMigration extends Migration
{
    public function up()
    {
        $this->forge->addField(
            [
                'id' => [
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => true,
                    'auto_increment' => true,
                ],
                'hr_grade' => [
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => true,
                ],
                'hr_class' => [
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => true,
                ],
                'name' => [
                    'type' => 'VARCHAR',
                    'constraint' => '100',
                ],
                'description' => [
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                ],
                'school_id' => [
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => true,
                ],
                'created_at datetime default current_timestamp',
                'updated_at datetime default current_timestamp',
            ]
        );
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('school_id', 'school', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('homeroom');
    }
    
    public function down()
    {
        $this->forge->dropTable('homeroom');
    }
}
