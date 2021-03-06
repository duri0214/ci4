<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MPostalMigration extends Migration
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
                'code' => [
                    'type' => 'VARCHAR',
                    'constraint' => '7',
                ],
                'prefecture' => [
                    'type' => 'VARCHAR',
                    'constraint' => '10',
                    'null' => true,
                ],
                'municipality' => [
                    'type' => 'VARCHAR',
                    'constraint' => '100',
                    'null' => true,
                ],
                'town' => [
                    'type' => 'VARCHAR',
                    'constraint' => '100',
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
        $this->forge->createTable('m_postal');
    }

    public function down()
    {
        $this->forge->dropTable('m_postal');
    }
}
