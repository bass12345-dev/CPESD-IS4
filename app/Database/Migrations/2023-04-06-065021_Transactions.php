<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Transactions extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'transaction_id' => [
                'type'           => 'INT',
                'constraint'     => 50,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'created_by' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'number' => [
                'type'       => 'INT',
                'constraint' => '150',
            ],
            'date_and_time_filed' => [
                'type'       => 'DATETIME',
                
            ],
            'responsible_section_id' => [
                'type'       => 'INT',
                'constraint' => '150',
                
            ],
            'type_of_activity_id' => [
                'type'       => 'INT',
                'constraint' => '150',
                
            ],
            'under_type_of_activity_id' => [
                'type'       => 'INT',
                'constraint' => '150',
                
            ],
            'responsibility_center_id' => [
                'type'       => 'INT',
                'constraint' => '150',
                
            ],
            'date_and_time' => [
                'type'       => 'DATETIME',
                
            ],
            'cso_Id' => [
                'type'       => 'INT',
                'constraint' => '150',
                
            ],
            'is_project_monitoring' => [
                'type' => 'INT',
                'default' => '1',
                
                
            ],
            'is_traning' => [
                'type' => 'INT',
                'default' => '1',
                
            ],
            // 'transaction_status' => [
            //     'type' => 'ENUM("pending","completed")',
            //     'default' => 'pending',
            //     'null' => FALSE,
                
            // ],
            'remarks' => [
                'type'       => 'TEXT',
                
            ],
            'action_taken_date' => [
                'type'       => 'DATETIME',
                
            ],

        
        
            
        ]);
        $this->forge->addKey('transaction_id', true);
        $this->forge->createTable('transactions');
    }

    public function down()
    {
         $this->forge->dropTable('transactionss');
    }
}
