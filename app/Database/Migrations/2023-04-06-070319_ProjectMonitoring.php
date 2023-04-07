<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ProjectMonitoring extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'project_monitoring_id' => [
                'type'           => 'INT',
                'constraint'     => 50,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'project_transact_id' => [
                'type'       => 'INT',
                'constraint' => '20',
            ],
            'project_title' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
            ],
            'period' => [
                'type'       => 'DATETIME',
            ],
            'attendance_present' => [
                'type'       => 'INT',
                'constraint' => '50',
            ],
            'attendance_absent' => [
                'type'       => 'INT',
                'constraint' => '150',
            ],
            'nom_borrowers_delinquent' => [
                'type'       => 'INT',
                'constraint' => '150',
                
            ],
            'nom_borrowers_overdue' => [
                'type'       => 'INT',
                'constraint' => '150',
                
            ],
            'total_production' => [
                'type'       => 'INT',
                'constraint' => '150',
                
            ],
            'total_collection_sales' => [
                'type'       => 'DECIMAL(10,2)',
                
            ],
            'total_released_purchases' => [
                'type'       => 'DECIMAL(10,2)',
                
            ],
            'total_delinquent_account' => [
                'type'       => 'DECIMAL(10,2)',
                
            ],
            'total_over_due_account' => [
                'type'       => 'DECIMAL(10,2)',
                
            ],
            'cash_in_bank' => [
                'type'       => 'DECIMAL(10,2)',
                
            ],
            'cash_on_hand' => [
                'type'       => 'DECIMAL(10,2)',
                
            ],
            'inventories' => [
                'type'       => 'INT',
                'constraint' => '150',
                
            ],
        
            
        ]);
        $this->forge->addKey('project_monitoring_id', true);
        $this->forge->createTable('project_monitoring');
    }

    public function down()
    {
         $this->forge->dropTable('project_monitoring');
    }
}
