<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\CustomModel;

class TypeOfActivity extends BaseController
{
    public    $activities_table = 'type_of_activities';
    public    $under_activity_table = 'under_type_of_activity';
    public $order_by_desc = 'desc';
    public $order_by_asc = 'asc';
    protected $request;
    protected $CustomModel;

    public function __construct()
    {
       $db = db_connect();
       $this->CustomModel = new CustomModel($db); 
       $this->request = \Config\Services::request();  
    }
   public function add_type_of_activity()
    {

        if ($this->request->isAJAX()) {

            $data = array(

                        'type_of_activity_name' => $this->request->getPost('activity'),
                        'type_act_created' =>  date('Y-m-d H:i:s', time())
            );

            $result  = $this->CustomModel->addData($this->activities_table,$data);

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


     public function get_activities(){

        $data = [];
        $item = $this->CustomModel->get_all_desc($this->activities_table,'type_act_created',$this->order_by_desc); 
        foreach ($item as $row) {
            
                $data[] = array(

                        'type_of_activity_id' => $row->type_of_activity_id,
                        'type_of_activity_name' => $row->type_of_activity_name,
                       
                );
        }

        echo json_encode($data);
    }



    public function add_under_type_of_activity(){
        if ($this->request->isAJAX()) {

            $data = array(

                            'under_type_act_name' =>$this->request->getPost('under_type_activity'),
                            'typ_ac_id' => $this->request->getPost('act_id'),
                            'under_type_act_created ' =>  date('Y-m-d H:i:s', time())
            );

            $result  = $this->CustomModel->addData($this->under_activity_table,$data);

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




    public function get_under_type_of_activity(){

        if ($this->request->isAJAX()) {
            $data = [];
            $count = $this->CustomModel->countwhere($this->under_activity_table,array('typ_ac_id' => $this->request->getPost('id')));

            if($count > 0){

            

                $items = $this->CustomModel->getwhere_orderby($this->under_activity_table,array('typ_ac_id' => $this->request->getPost('id')),'under_type_act_name',$this->order_by_asc);
                foreach ($items as $row) {
            
                    $data[] = array(
    
                            'under_type_act_name' => $row->under_type_act_name,
                            'typ_ac_id' => $row->typ_ac_id,
                            'under_type_act_id' => $row->under_type_act_id 
                    );
            }
    
           
        }else {
            $data = [];
        }
         echo json_encode($data);
        }

    }
}
