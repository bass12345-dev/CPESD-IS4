<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\CustomModel;

class  Responsibility  extends BaseController
{
    public    $responsibility_table = 'responsibility_center';
    public $order_by_desc = 'desc';
    protected $request;
    protected $CustomModel;

    public function __construct()
    {
       $db = db_connect();
       $this->CustomModel = new CustomModel($db); 
       $this->request = \Config\Services::request();  
    }
    public function add_responsibiliy()
    {
       if ($this->request->isAJAX()) {

            $data = array(

                    'responsibility_center_code' => $this->request->getPost('res_code'),
                    'responsibility_center_name' => $this->request->getPost('center_name'),
                    'responsibility_created' =>  date('Y-m-d H:i:s', time())
            );

           $verify = $this->CustomModel->countwhere($this->responsibility_table,array('responsibility_center_code' => $data['responsibility_center_code']));

           if ($verify > 0) {

             $data = array(
                'message' => 'Error Duplicate Code',
                'response' => false
                );
              
           }else {

             $result  = $this->CustomModel->addData($this->responsibility_table,$data);

                if ($result) {

                    $data = array(
                    'message' => 'Data Saved Successfully',
                    'response' => true
                    );
                }else {

                    $data = array(
                    'message' => 'Error',
                    'response' => false
                    );
                }
               
           }

            echo json_encode($data);

       }
    }

    public  function get_responsibility(){


        $data = [];
        $item = $this->CustomModel->get_all_desc($this->responsibility_table,'responsibility_created',$this->order_by_desc); 
        foreach ($item as $row) {
            
                $data[] = array(

                        'responsibility_center_code' => $row->responsibility_center_code,
                        'responsibility_center_name' => $row->responsibility_center_name,
                        'responsibility_center_id' => $row->responsibility_center_id 
                );
        }

        echo json_encode($data);

    }
}
