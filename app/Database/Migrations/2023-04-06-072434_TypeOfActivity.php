<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TypeOfActivity extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'type_of_activity_id' => [
                'type'           => 'INT',
                'constraint'     => 50,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'type_of_activity_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
            ],
            'type_act_created' => [
                'type'       => 'DATETIME',
                
            ],
        
            
        ]);
        $this->forge->addKey('type_of_activity_id', true);
        $this->forge->createTable('type_of_activities');
    }

    public function down()
    {
         $this->forge->dropTable('type_of_activities');
    }
}
