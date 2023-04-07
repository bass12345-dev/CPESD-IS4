<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Cso extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'cso_id' => [
                'type'           => 'INT',
                'constraint'     => 50,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'cso_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
            ],
            'purok_number' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'barangay' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
            ],
            'contact_person' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'contact_number' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'telephone_number' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
             'email_address' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'type_of_cso' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'cso_status' => [
                'type' => 'ENUM("active","inactive")',
                'default' => 'active',
                'null' => FALSE,
            ],
            'cor' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
            ],
            'bylaws' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
            'aoc/aoi' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
            'other_docs' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
             'cso_created' => [
                'type'       => 'DATETIME',
               
            ],
            
        ]);
        $this->forge->addKey('cso_id', true);
        $this->forge->createTable('cso');
    }

    public function down()
    {
         $this->forge->dropTable('cso');
    }
}
