<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CsoOfficers extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'cso_officer_id' => [
                'type'           => 'INT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'first_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'middle_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'last_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'extension' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'contact_number' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'email_address' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'cso_officer_created' => [
                'type'       => 'DATETIME',
                
            ],

        
            
        ]);
        $this->forge->addKey('cso_officer_id', true);
        $this->forge->createTable('cso_officers');
    }

    public function down()
    {
         $this->forge->dropTable('cso_officers');
    }
}
