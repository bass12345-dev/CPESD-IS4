<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\CustomModel;

class Users extends BaseController
{
    public $users_table = 'users';
    protected $request;
    protected $CustomModel;

    public function __construct()
    {
       $db = db_connect();
       $this->CustomModel = new CustomModel($db); 
       $this->request = \Config\Services::request();  
    }

    public function add_user()
    {
        if ($this->request->isAJAX()) {

            $data = array(
                'first_name' => $this->request->getPost('first_name'),
                'middle_name' => ($this->request->getPost('middle_name') == '') ?  '' : $this->request->getPost('middle_name') ,
                'last_name' => $this->request->getPost('last_name'),
                'extension' => ($this->request->getPost('extension') == '') ?  '' : $this->request->getPost('extension') ,
                'user_type' => $this->request->getPost('user_type'),
                'username' => $this->request->getPost('username'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'user_created' =>  date('Y-m-d H:i:s', time()),
                'user_status' => 'active',
              
            );

            $verify = $this->CustomModel->countwhere($this->users_table,array('username' => $data['username']));

            if ($verify > 0) {

                $data = array(
                'message' => 'Error Duplicate Username',
                'response' => false
                );
               
            }else {

                $result  = $this->CustomModel->addData($this->users_table,$data);

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


    public function get_user_active(){

        $data = [];
        $where = array('user_status' => 'active');
        $item = $this->CustomModel->getwhere($this->users_table,$where); 
        foreach ($item as $row) {
            $a = '';

            if ($row->user_type == 'admin') {
                $a = '';
            }else {
                $a = '<ul class="d-flex justify-content-center"><li class="mr-1"><a href="'.base_url().'View/user_profile?id='.$row->user_id.'" data-id="'.$row->user_id.'"   class="text-secondary action-icon"><i class="ti-eye"></i></a></li><li><a href="javascript:;" data-id="'.$row->user_id.'"  id="delete-user" data-set="inactive" class="text-danger action-icon"><i class="ti-close"></i></a></li></ul>';
            }
 
                $data[] = array(

                        'name' => $row->first_name.' '.$row->middle_name.' '.$row->last_name.' '.$row->extension,
                        'user_type' => $row->user_type,
                        'username' => $row->username,
                        'user_id' => $row->user_id,
                        'action' => $a

                );
        }

        echo json_encode($data);

    }

    public function get_user_inactive(){

        $data = [];
        $where = array('user_status' => 'inactive');
        $item = $this->CustomModel->getwhere($this->users_table,$where); 
        foreach ($item as $row) {
            $a = '';

            if ($row->user_type == 'admin') {
                $a = '';
            }else {
                $a = '<ul class="d-flex justify-content-center"><li class="mr-1"><a href="javascript:;" data-id="'.$row->user_id.'"  id="delete-user"  class="text-secondary action-icon"><i class="ti-eye"></i></a></li><li><a href="javascript:;" data-id="'.$row->user_id.'" data-set="active" id="active-user"  class="text-success action-icon"><i class="ti-check"></i></a></li></ul>';
            }

                $data[] = array(

                        'name' => $row->first_name.' '.$row->middle_name.' '.$row->last_name.' '.$row->extension,
                        'user_type' => $row->user_type,
                        'username' => $row->username,
                        'user_id' => $row->user_id,
                        'action' => $a


                );
        }

        echo json_encode($data);

    }

    public function update_user_status(){

        $data = array('user_status' => $this->request->getPost('status'));
        $where = array('user_id' => $this->request->getPost('id'));
        $update = $this->CustomModel->updatewhere($where,$data,$this->users_table);

        if ($update) {

            $data = array(
                'message' => 'Updated Successfully',
                'response' => true
            );
            # code...
        }else {

            $data = array(
                'message' => 'Error',
                'response' => false
            );

        }

        echo json_encode($data);

    }
   
}
