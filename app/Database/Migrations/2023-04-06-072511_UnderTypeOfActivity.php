<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UnderTypeOfActivity extends Migration
{
    public function up()
    {
   $this->forge->addField([
            'under_type_act_id' => [
                'type'           => 'INT',
                'constraint'     => 50,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'typ_ac_id' => [
                'type'       => 'INT',
                'constraint' => '50',
            ],
            'under_type_act_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
            ],
            'under_type_act_created' => [
                'type'       => 'DATETIME',
                
            ],
        
            
        ]);
        $this->forge->addKey('under_type_act_id', true);
        $this->forge->createTable('under_type_of_activity');
    }

    public function down()
    {
         $this->forge->dropTable('under_type_of_activity');
    }
}
