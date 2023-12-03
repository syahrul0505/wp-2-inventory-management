<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateStockOutMaterialTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'         => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'material_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'material_out' => [
                'type'       => 'INT',
                'constraint' => '255',
            ],
            'current_stock' => [
                'type' => 'date',
                'null' => true,
            ],
            'description' => [
                'type'       => 'TEXT',
                'null' => true,
            ],
            'created_at' => [
                'type' => 'datetime',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'datetime',
                'null' => true,
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('stock_out_materials');
    }

    public function down()
    {
        $this->forge->dropTable('stock_out_materials');
    }
}
