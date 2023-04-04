<?php

namespace App\Models;

use CodeIgniter\Model;

use CodeIgniter\Database\ConnectionInterface;


class CustomModel extends Model
{
    protected $db;

    public function __construct(ConnectionInterface &$db){
       parent::__construct();
       $this->db =& $db;
       // $db = \Config\Database::connect();
    }
   // Get

    public function getwhere($table,$where){
         
        $builder = $this->db->table($table);
        $builder->where($where);
        $query = $builder->get()->getResult();
        return $query;
        
    }

    // Count

    public function countwhere($table,$where){
         
        $builder = $this->db->table($table);
        $builder->where($where);
        $query = $builder->countAllResults();
        return $query;
        
    }

    // Add

    // Update

    // Delete
}
