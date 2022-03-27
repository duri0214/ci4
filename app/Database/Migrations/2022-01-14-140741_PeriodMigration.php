<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Period extends Migration
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
                'm_school_id' => [
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
                'created_at datetime default current_timestamp',
                'updated_at datetime default null on update current_timestamp',
            ]
        );
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('m_school_id', 'm_school', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addUniqueKey(['m_school_id', 'from_date', 'to_date']);
        $this->forge->createTable('m_period');
    }

    public function down()
    {
        $this->forge->dropTable('m_period');
    }
}
