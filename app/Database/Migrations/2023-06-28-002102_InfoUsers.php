<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class InfoUsers extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'user_id' => [
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
            'surname' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null' => false,
            ],
            'country_id' => [
                'type'       => 'INT',
                'constraint' => '12',
                'unsigned'   => true,
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
        $this->forge->addKey('user_id', true);
        $this->forge->createTable('info_users');
    }

    public function down()
    {
        $this->forge->dropTable('info_users');
    }
}
