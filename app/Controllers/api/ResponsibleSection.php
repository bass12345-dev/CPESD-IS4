<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\CustomModel;

class ResponsibleSection extends BaseController
{
    public    $responsible_table = 'responsible_section';
    public $order_by_desc = 'desc';
    protected $request;
    protected $CustomModel;

    public function __construct()
    {
       $db = db_connect();
       $this->CustomModel = new CustomModel($db); 
       $this->request = \Config\Services::request();  
    }
    public function add_responsible()
    {

        if ($this->request->isAJAX()) {

           $data = array(

                        'responsible_section_name' => $this->request->getPost('responsible_section'),
                        'responsible_section_created' =>  date('Y-m-d H:i:s', time())
            );

            $result  = $this->CustomModel->addData($this->responsible_table,$data);

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

             echo json_encode($data);
        }
    }

    public function get_responsible(){

        $data = [];
        $item = $this->CustomModel->get_all_desc($this->responsible_table,'responsible_section_created',$this->order_by_desc); 
        foreach ($item as $row) {
            
                $data[] = array(

                        'responsible_section_id' => $row->responsible_section_id,
                        'responsible_section_name' => $row->responsible_section_name,
                       
                );
        }

        echo json_encode($data);
    }
}
