<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ResponsibleSection extends Migration
{
    public function up()
    {
   $this->forge->addField([
            'responsible_section_id' => [
                'type'           => 'INT',
                'constraint'     => 50,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'responsible_section_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
            ],
            'responsible_section_created' => [
                'type'       => 'DATETIME',
                
            ],
        
            
        ]);
        $this->forge->addKey('responsible_section_id', true);
        $this->forge->createTable('responsible_section');
    }

    public function down()
    {
         $this->forge->dropTable('responsible_section');
    }
}
