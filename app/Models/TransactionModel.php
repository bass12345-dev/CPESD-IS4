<?php

namespace App\Models;

use CodeIgniter\Model;

use CodeIgniter\Database\ConnectionInterface;

class TransactionModel extends Model
{

    protected $db;

    public function __construct(ConnectionInterface &$db){
       parent::__construct();
       $this->db =& $db;
    }


    public function get_last_pmas_number_where($where){
         
        $builder = $this->db->table('transactions');
        $builder->where("DATE_FORMAT(transactions.date_and_time_filed,'%Y') = '".$where."' ");
        $builder->orderBy('date_and_time_filed','desc');
        $query = $builder->get();
        return $query;
        
    }

    public function verify_pmas_number($where){

        $builder = $this->db->table('transactions');
        $builder->where("DATE_FORMAT(transactions.date_and_time_filed,'%Y-%m') = '".$where['date_and_time_filed']."' ");
        $builder->where('number',$where['number']);
        $query = $builder;
        return $query;
    }
    
    
    public function getAllTransactions($order_key,$order_by){
         
        $builder = $this->db->table('transactions');
        $builder->join('users','users.user_id = transactions.created_by');
        $builder->orderBy($order_key, $order_by);
        $query = $builder->get()->getResult();
        return $query;
        
    }
}
