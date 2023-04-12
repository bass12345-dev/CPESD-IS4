<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\CustomModel;

class Cso extends BaseController
{
    public $cso_table = 'cso';
    public $cso_officer_table = 'cso_officers';
    public $order_by_desc = 'desc';
    public $order_by_asc = 'asc';
    protected $request;
    protected $CustomModel;
    public $position_array = [
        'President/BOD Chairperson/BOT',
        'Vice President/BOD Vice Chairperson',
        'Secretary',
        'Treasurer',
        'Auditor',
        'Manager'
        ];

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
                'cso_status' => $row->cso_status


            );
        } 

        echo json_encode($data);

    }


    function query_cso_where($where){
        $data = [];
        $item = $this->CustomModel->getwhere($this->cso_table,$where);
        foreach ($item as $row) {

            $data[] = array(
                'cso_id' => $row->cso_id,
                'cso_name' => $row->cso_name,
                'cso_code' => $row->cso_code,
                'address' => $row->purok_number.' '.$row->barangay,
                'contact_person' => $row->contact_person,
                'contact_number' => $row->contact_number,
                'telephone_number' => $row->telephone_number,    
                'email_address' => $row->email_address,
                'type_of_cso' => $row->type_of_cso,
                'cso_status' => $row->cso_status

            );
        } 

        echo json_encode($data);
    }



public function get_cso_information(){


 

	$row = $this->CustomModel->getwhere($this->cso_table,array('cso_id' =>  $this->request->getPost('id')))[0];
	$data = array(
        'cso_id' => $row->cso_id,
        'cso_name' => $row->cso_name,
        'cso_code' => $row->cso_code,
        'address' => 'Purok '.$row->purok_number.' '.$row->barangay,
        'contact_person' => $row->contact_person,
        'contact_number' => $row->contact_number,
        'telephone_number' => $row->telephone_number,    
        'email_address' => $row->email_address,
        'type_of_cso' => strtoupper($row->type_of_cso),
        'cso_status' => $row->cso_status == 'active' ?  '<span class="status-p bg-success">'.ucfirst($row->cso_status).'</span>' : '<span class="status-p bg-success">'.ucfirst($row->cso_status).'</span>',
           

    );

    echo json_encode($data);


}


public function update_cso_status(){

    $data = array(
        'cso_status' => $this->request->getPost('cso_status')
    );

    $where = array(
        'cso_id' => $this->request->getPost('cso_id')
    );

    $update = $this->CustomModel->updatewhere($where,$data,$this->cso_table);

    if($update){

        $resp = array(
            'message' => 'Successfully Updated',
            'response' => true
        );

    }else {

        $resp = array(
            'message' => 'Error',
            'response' => false
        );

    }

    echo json_encode($resp);

}


//CSO Officers

public function add_cso_officer()
{
if ($this->request->isAJAX()) {
        // $pieces = explode("-",$this->request->getPost('cso_position'));
        // $number =  $pieces[1];
        // $pieces2 = explode("-",$this->request->getPost('cso_position'));
        // $position =  $pieces2[0];

    
   
 
            $data = array(
                'officer_cso_id' => $this->request->getPost('cso_id'),
                'cso_position' => explode("-",$this->request->getPost('cso_position'))[0],
                'position_number' => explode("-",$this->request->getPost('cso_position'))[1],
                'first_name' => $this->request->getPost('first_name'),
                'middle_name' => ($this->request->getPost('middle_name') == '') ?  '' : $this->request->getPost('middle_name') ,
                'last_name' => $this->request->getPost('last_name'),
                'extension' => ($this->request->getPost('extension') == '') ?  '' : $this->request->getPost('extension') ,
                'cso_position' => $this->request->getPost('cso_position'),
                'contact_number' => $this->request->getPost('contact_number'),
                'email_address' => $this->request->getPost('email'),
                'cso_officer_created' =>  date('Y-m-d H:i:s', time()),
                
            
            );



        $verify = $this->CustomModel->countwhere($this->cso_officer_table,array('cso_position' => $data['cso_position'],'position_number' => $data['position_number'],'officer_cso_id' => $data['officer_cso_id']));
        
        if ($verify > 0) {

            $data = array(
               'message' => 'Position is already taken',
               'response' => false
               );
             
          }else {

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

          }
        
         
    

        echo json_encode($data);
    }
    

 }


 public function get_officers(){

    $data = [];
    $pid = 0;
    $id = 1;
    $item = $this->CustomModel->getwhere_orderby($this->cso_officer_table,array('officer_cso_id' => $this->request->getPost('cso_id')),'position_number',$this->order_by_asc); 
    foreach ($item as $row) {
        
            $data[] = array(
                    'id' => $id++,
                    'pid' => $pid++,
                    'name' => $row->first_name.' '.$row->middle_name.' '.$row->last_name.' '.$row->extension,
                    'title' => explode("-",$row->cso_position)[0], 
                    'img' => "https://www.pngitem.com/pimgs/m/504-5040528_empty-profile-picture-png-transparent-png.png",
                    'contact_number' => $row->contact_number, 
                    'email_address' => $row->email_address,
                    'cso_officer_id' => $row->cso_officer_id, 
                    
                    

                   
            );
    }

    echo json_encode($data);

    


 }
}

