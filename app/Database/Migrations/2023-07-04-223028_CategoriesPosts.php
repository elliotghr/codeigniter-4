<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CategoriesPosts extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'post_id' => [
                'type'           => 'INT',
                'constraint'     => 12,
                'unsigned'       => true,
                'null'           => false,
            ],
            'category_id' => [
                'type'           => 'INT',
                'constraint'     => 12,
                'unsigned'       => true,
                'null'           => false,
            ],
        ]);
        $this->forge->addForeignKey('post_id', 'posts', 'id', 'CASCADE', 'RESTRICT');
        $this->forge->addForeignKey('category_id', 'categories', 'id', 'CASCADE', 'RESTRICT');
        $this->forge->createTable('categories_posts');
    }

    public function down()
    {
        $this->forge->dropTable('categories_posts');
    }
}
