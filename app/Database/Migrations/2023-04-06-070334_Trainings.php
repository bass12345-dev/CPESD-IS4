<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Trainings extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'training_id' => [
                'type'           => 'INT',
                'constraint'     => 50,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'training_transact_id' => [
                'type'       => 'INT',
                'constraint' => '20',
            ],
            'title_of_training' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
            ],
            'number_of_participants' => [
                'type'       => 'INT',
                'constraint' => '50',
            ],
            'female' => [
                'type'       => 'INT',
                'constraint' => '50',
            ],
            'overall_ratings' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
            ],
            'name_of_trainor' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
                
            ],
            'training_created' => [
                'type'       => 'DATETIME',
                
            ],
        
            
        ]);
        $this->forge->addKey('training_id', true);
        $this->forge->createTable('trainings');
    }

    public function down()
    {
         $this->forge->dropTable('trainings');
    }
}
