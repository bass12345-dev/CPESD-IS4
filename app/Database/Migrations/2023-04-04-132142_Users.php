<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'user_id' => [
                'type'           => 'INT',
                'constraint'     => 50,
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
                'constraint' => '10',
            ],
            'contact_number' => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
            ],
            'email_address' => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
            ],
            'profile_pic' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'user_type' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
             'user_status' => [
                'type' => 'ENUM("active","inactive")',
                'default' => 'active',
                'null' => FALSE,
            ],
            'username' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
            ],
            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
            'user_created' => [
                'type'       => 'DATETIME',
                
            ],
            
        ]);
        $this->forge->addKey('user_id', true);
        $this->forge->createTable('users');
    }

    public function down()
    {
         $this->forge->dropTable('users');
    }
}
