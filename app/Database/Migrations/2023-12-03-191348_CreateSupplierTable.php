<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSupplierTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'supplier_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'telephone' => [
                'type' => 'VARCHAR',
                'null' => true,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'null' => true,
            ],
            'address' => [
                'type' => 'TEXT',
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
        $this->forge->createTable('suppliers');
    }

    public function down()
    {
        $this->forge->dropTable('suppliers');
    }
}
