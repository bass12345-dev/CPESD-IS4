<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\CustomModel;
use App\Models\TransactionModel;

class PendingTransactions extends BaseController
{
    public $transactions_table = 'transactions';
    public $order_by_desc = 'desc';
    public $order_by_asc = 'asc';
    protected $request;
    protected $CustomModel;
    protected $TransactionModel;

    public function __construct()
    {
       $db = db_connect();
       $this->CustomModel = new CustomModel($db); 
       $this->TransactionModel = new TransactionModel($db); 
       $this->request = \Config\Services::request();  
    }

    public function get_last_pmas_number()
    {
        if ($this->request->isAJAX()) {

            $l = '';
            $verify = $this->CustomModel->count_all_order_by($this->transactions_table,'date_and_time_filed',$this->order_by_desc);
            if($verify) {
                if(date('Y', time()) > date('Y', strtotime($this->CustomModel->get_all_order_by($this->transactions_table,'date_and_time_filed',$this->order_by_desc)[0]->date_and_time_filed)))
                {
                    $l = 1;
                }else if(date('Y', time()) < date('Y', strtotime($this->CustomModel->get_all_order_by($this->transactions_table,'date_and_time_filed',$this->order_by_desc)[0]->date_and_time_filed))){

                    $l = $this->TransactionModel->get_last_pmas_number_where(date('Y-m-d', time()))->getResult()[0]['number'] + 1;

                }else if (date('Y', time()) === date('Y', strtotime($this->CustomModel->get_all_order_by($this->transactions_table,'date_and_time_filed',$this->order_by_desc)[0]->date_and_time_filed))) 
	
			    {
                    $l = $this->TransactionModel->get_last_pmas_number_where(date('Y-m-d', time()))->getResult()[0]['number'] + 1;
                }
            }else {
                $l = 1;
            }
            
            echo $l;

        }
    }
}
