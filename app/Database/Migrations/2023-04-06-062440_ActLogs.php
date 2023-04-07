<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ActLogs extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'activity_log_id' => [
                'type'           => 'INT',
                'constraint'     => 50,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type'       => 'INT',
                'constraint' => '20',
            ],
            'action' => [
                'type'       => 'TEXT',
                'constraint' => '50',
            ],
            'activity_log_created' => [
                'type'       => 'DATETIME',
                
            ],
        
            
        ]);
        $this->forge->addKey('activity_log_id', true);
        $this->forge->createTable('activity_logs');
    }

    public function down()
    {
         $this->forge->dropTable('activity_logs');
    }
}
