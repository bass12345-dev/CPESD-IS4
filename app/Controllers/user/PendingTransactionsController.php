<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\CustomModel;
use App\Models\TransactionModel;

class PendingTransactionsController extends BaseController
{
    public $transactions_table = 'transactions';
    public $responsible_section_table = 'responsible_section';
    public $responsibility_center_table = 'responsibility_center';
    public $activity_table = 'type_of_activities';
    public $cso_table = 'cso';
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
    public function index()
    {
       if (session()->get('user_type') == 'user') {
        $data['title'] = 'Pending Transactions';
        return view('user/transactions/pending/index',$data);
        }else {
           return redirect()->back();
        }
    }
    
    public function add_transaction(){
        if (session()->get('user_type') == 'user') {
            $data['title'] = 'Add Transactions';
            $data['activities'] = $this->CustomModel->get_all_order_by($this->activity_table,'type_of_activity_name',$this->order_by_desc);
            $data['responsible'] = $this->CustomModel->get_all_order_by($this->responsible_section_table,'responsible_section_name',$this->order_by_desc);
            $data['responsibility_centers'] = $this->CustomModel->get_all_order_by($this->responsibility_center_table,'responsibility_center_name',$this->order_by_desc);
            $data['cso'] = $this->CustomModel->getwhere_orderby($this->cso_table,array('cso_status'=> 'active'),'cso_name',$this->order_by_asc);
            $data['training_text'] = 'training';
            $data['rgpm_text'] = 'regular monthly project monitoring';
            return view('user/transactions/pending/add_section/index',$data);
            }else {
               return redirect()->back();
            }
    }
}
