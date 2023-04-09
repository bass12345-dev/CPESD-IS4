<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\CustomModel;

class Cso extends BaseController
{
    public $cso_table = 'cso';
    public $cso_officer_table = 'cso_officers';
    public $order_by_desc = 'desc';
    public $order_by_asd = 'asc';
    protected $request;
    protected $CustomModel;

    public function __construct()
    {
       $db = db_connect();
       $this->CustomModel = new CustomModel($db); 
       $this->request = \Config\Services::request();  
    }

    public function add_cso()
    {
    if ($this->request->isAJAX()) {
        $data = array(
                'cso_name' => $this->request->getPost('cso_name'),
                'cso_code' => $this->request->getPost('cso_code'),
                'type_of_cso' => $this->request->getPost('cso_type'),
                'purok_number' => $this->request->getPost('purok') ,
                'barangay' => $this->request->getPost('barangay'),
                'contact_person' => ($this->request->getPost('contact_person') == '') ?  '' : $this->request->getPost('contact_person') ,
                'contact_number' => $this->request->getPost('contact_number'),
                'telephone_number' => ($this->request->getPost('telephone_number') == '') ?  '' : $this->request->getPost('telephone_number'),
                'email_address' => ($this->request->getPost('email_address') == '') ?  '' : $this->request->getPost('email_address'),
                'cso_status' => 'active',
                'cso_created' => date('Y-m-d H:i:s', time())
              
            );

         $verify = $this->CustomModel->countwhere($this->cso_table,array('cso_code' => $data['cso_code']));
         if ($verify > 0) {

            $data = array(
                'message' => 'Error Duplicate Code',
                'response' => false
                );

         }else {
            
             $result  = $this->CustomModel->addData($this->cso_table,$data);

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

    public function get_cso(){

        if ($this->request->isAJAX()) {

           $where = array('cso_status' => $this->request->getPost('cso_status'),'type_of_cso' => $this->request->getPost('cso_type'));


           if ($where['cso_status'] != '' &&  $where['type_of_cso'] == '' ) {

               $where_status = array('cso_status' => $where['cso_status']);
               $this->query_cso_where($where_status);

           }else if ($where['type_of_cso'] != '' && $where['cso_status'] == '' ) {
              
                $where_status = array('type_of_cso' => $where['type_of_cso']);
                $this->query_cso_where($where_status);

           }else if ($where['cso_status'] != '' &&  $where['type_of_cso'] != '') {

                $where_status = array('cso_status' => $where['cso_status'],'type_of_cso' => $where['type_of_cso']);
                $this->query_cso_where($where_status);
               
           }else if ($where['cso_status'] == '' &&  $where['type_of_cso'] == '') {

               
               $this->query_all_cso();
           }

        }

    }

    function query_all_cso(){

        $data = [];
        $item = $this->CustomModel->get_all_desc($this->cso_table,'cso_created',$this->order_by_desc);
        foreach ($item as $row) {

            $data[] = array(

                'cso_id' => $row->cso_id,
                'cso_name' => $row->cso_name,
                'cso_code' => $row->cso_code,
                'address' => 'Purok '.$row->purok_number.' '.$row->barangay,
                'contact_person' => $row->contact_person,
                'contact_number' => $row->contact_number,
                'telephone_number' => $row->telephone_number,    
                'email_address' => $row->email_address,
                'type_of_cso' => strtoupper($row->type_of_cso),


            );
        } 

        echo json_encode($data);

    }


    function query_cso_where($where){
        $data = [];
        $item = $this->CustomModel->getwhere($this->cso_table,$where);
        foreach ($item as $row) {

            $data[] = array(

                'cso_name' => $row->cso_name,
                'address' => $row->purok_number.' '.$row->barangay,
                'contact_person' => $row->contact_person,
                'contact_number' => $row->contact_number,
                'telephone_number' => $row->telephone_number,    
                'email_address' => $row->email_address,
                'type_of_cso' => $row->type_of_cso

            );
        } 

        echo json_encode($data);
    }





//CSO Officers

public function add_cso_officer()
{
if ($this->request->isAJAX()) {
    
            $data = array(
                'officer_cso_id' => $this->request->getPost('cso_id'),
                'first_name' => $this->request->getPost('first_name'),
                'middle_name' => ($this->request->getPost('middle_name') == '') ?  '' : $this->request->getPost('middle_name') ,
                'last_name' => $this->request->getPost('last_name'),
                'extension' => ($this->request->getPost('extension') == '') ?  '' : $this->request->getPost('extension') ,
                'cso_position' => $this->request->getPost('cso_position'),
                'contact_number' => $this->request->getPost('contact_number'),
                'email_address' => $this->request->getPost('email'),
                'cso_officer_created' =>  date('Y-m-d H:i:s', time()),
                
            
            );

        
         $result  = $this->CustomModel->addData($this->cso_officer_table,$data);

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
}

