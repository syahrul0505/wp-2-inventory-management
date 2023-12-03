<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMaterialTable extends Migration
{
    public function up()
    {
        $fields = [
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'code' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'unit' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'description' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'created_at' => [
                'type'       => 'datetime',
                'null' => true,
            ],
            'updated_at' => [
                'type'       => 'datetime',
                'null' => true,
            ],
        ];
    
        $this->forge->addField($fields);
        $this->forge->addKey('id', true);
        $this->forge->createTable('materials');
    }

    public function down()
    {
        $this->forge->dropTable('materials');
    }
}
