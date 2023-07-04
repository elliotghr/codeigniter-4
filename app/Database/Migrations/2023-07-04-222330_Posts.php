<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Posts extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 12,
                'unsigned'       => true,
                'auto_increment' => true,
                'null'           => false,
            ],
            'title' => [
                'type'       => 'VARCHAR',
                'constraint' => '140',
                'null' => false,
            ],
            'slug' => [
                'type'       => 'VARCHAR',
                'constraint' => '140',
                'null' => false,
                'unique' => true,
            ],
            'body' => [
                'type'       => 'TEXT',
                'null' => false,
            ],
            'cover' => [
                'type'       => 'VARCHAR',
                'constraint' => '40',
                'null' => false,
            ],
            'author' => [
                'type'       => 'INT',
                'constraint' => '12',
                'null' => true,
                'unsigned' => true,
            ],
            'publish_at' => [
                'type' => 'DATETIME',
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
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('author', 'users', 'id', 'CASCADE', 'RESTRICT');
        $this->forge->createTable('posts');
    }

    public function down()
    {
        $this->forge->dropTable('posts');
    }
}
