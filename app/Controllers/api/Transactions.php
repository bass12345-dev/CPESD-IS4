<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\CustomModel;
use App\Models\TransactionModel;

class Transactions extends BaseController
{
    public $transactions_table = 'transactions';
    public $type_of_activity_table = 'type_of_activities';
    public $training_table = 'trainings';
    public $project_monitoring_table = 'project_monitoring';
    public $order_by_desc = 'desc';
    public $order_by_asc = 'asc';
    protected $request;
    protected $CustomModel;
    protected $TransactionModel;
    protected $db;
    public function __construct()
    {
       $this->db = db_connect();
       $this->CustomModel = new CustomModel($this->db); 
       $this->TransactionModel = new TransactionModel($this->db); 
       $this->request = \Config\Services::request();  
    }
    public function get_all_transactions()
    {

        $data = [];

		$items = $this->TransactionModel->getAllTransactions('date_and_time_filed',$this->order_by_desc); 
        foreach ($items as $row ) {

            $data[] = array(
                        'transaction_id' => $row->transaction_id,
                        'pmas_no' => date('Y', strtotime($row->date_and_time_filed)).' - '.date('m', strtotime($row->date_and_time_filed)).' - '.$row->number,
                        'date_and_time_filed' => date('M,d Y', strtotime($row->date_and_time_filed)).' '.date('h:i a', strtotime($row->date_and_time_filed)),

                        'date_time' => date('M,d Y', strtotime($row->date_and_time)).' '.date('h:i a', strtotime($row->date_and_time)),
                        'is_training' => $row->is_training == 1 ? true : false,
                        'is_project_monitoring' =>  $row->is_project_monitoring == 1 ? true : false,
                        'name' => $row->first_name.' '.$row->middle_name.' '.$row->last_name.' '.$row->extension

            );
        # code...
    }

    echo json_encode($data);

        
    }
}
