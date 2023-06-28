<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Countries extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'country_id' => [
                'type'           => 'INT',
                'constraint'     => 12,
                'unsigned'       => true,
                'auto_increment' => true,
                'null' => false,
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null' => false,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => false,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('country_id', true);
        $this->forge->createTable('countries');
    }

    public function down()
    {
        $this->forge->dropTable('countries');
    }
}
