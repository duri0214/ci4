<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SchoolPeriodMigration extends Migration
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
                'school_curriculum_id' => [
                    'type' => 'INT',
                    'unsigned' => true,
                ],
                'name' => [
                    'type' => 'VARCHAR',
                    'constraint' => '50',
                ],
                'from_date' => [
                    'type' => 'date',
                    'default' => '0000-00-00',
                ],
                'to_date' => [
                    'type' => 'date',
                    'default' => '0000-00-00',
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
        $this->forge->addForeignKey('school_id', 'school', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('school_curriculum_id', 'school_curriculum', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addUniqueKey(['school_id', 'school_curriculum_id', 'from_date', 'to_date']);
        $this->forge->createTable('school_period');
    }

    public function down()
    {
        $this->forge->dropTable('school_period');
    }
}
