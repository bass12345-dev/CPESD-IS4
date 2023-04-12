<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CustomModel;

class CsoController extends BaseController
{
    public $cso_table = 'cso';
    public $order_by_desc = 'desc';
    public $order_by_asd = 'asc';
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
    public $type_of_cso_array = ['PO', 'Coop','NSC'];
    public $barangay_array = ['Tuyabang Bajo','Tuyabang Alto','Tuyabang Proper'];

    public function __construct()
    {
       $db = db_connect();
       $this->CustomModel = new CustomModel($db); 
       $this->request = \Config\Services::request();  
       
    }
    public function index()
    {

        if (session()->get('user_type') == 'admin') {
            $data['title'] = 'CSO';
            $data['type_of_cso'] = $this->type_of_cso_array;
            $data['barangay'] = $this->barangay_array;
            
            return view('admin/cso/index',$data);
        }else {
           return redirect()->back();
        }
    }


    public function view_cso(){

        if (session()->get('user_type') == 'admin') {
           
           $verify =  $this->CustomModel->countwhere($this->cso_table,array('cso_id' => $_GET['id']));
       
           if($verify) {
            $i = 1;
            $a = [];
            foreach ($this->position_array as $row) {
            
                $a[] =  array(  
   
                    'position' => $row,
                    'number' => $i++
                );
   
           }

               $data['title'] = $this->CustomModel->getwhere($this->cso_table,array('cso_id' => $_GET['id']))[0]->cso_name;
               $data['cso_type'] = strtoupper($this->CustomModel->getwhere($this->cso_table,array('cso_id' => $_GET['id']))[0]->type_of_cso);
            //    $data['positions'] = $this->position_array; 
                $data['type_of_cso'] = $this->type_of_cso_array;
                $data['barangay'] = $this->barangay_array;
                $data['positions'] = $a; 

               return view('admin/cso/view/index',$data);
           }else {
               return redirect()->back();
           }
           
 

          
           
       }else {
          return redirect()->back();
       }
       
   }


    public function view_officers(){

         if (session()->get('user_type') == 'admin') {
            
            $verify =  $this->CustomModel->countwhere($this->cso_table,array('cso_id' => $_GET['id']));
        
            if($verify) {
                $data['title'] = $this->CustomModel->getwhere($this->cso_table,array('cso_id' => $_GET['id']))[0]->cso_name;
                $data['cso_type'] = strtoupper($this->CustomModel->getwhere($this->cso_table,array('cso_id' => $_GET['id']))[0]->type_of_cso);
                $data['positions'] = $this->position_array; 
                return view('admin/cso/view_officers/index',$data);
            }else {
                return redirect()->back();
            }
            
  

           
            
        }else {
           return redirect()->back();
        }
        
    }
}
