<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\CustomModel;

class Auth extends BaseController
{
    public $users_table = 'users';
    protected $CustomModel;
    protected $request;
    protected $session;

    public function __construct()
    {
       $db = db_connect();
       $this->CustomModel = new CustomModel($db);
       $this->request = \Config\Services::request();
       $this->session = \Config\Services::session();
    }

    public function verify()
    {
            
        


        if ($this->request->isAJAX()) {
            $where = array('username' => $this->request->getPost('username'));
            $pass = $this->request->getPost('password');
            $verify = $this->CustomModel->countwhere($this->users_table,$where);

            if ($verify > 0) {
                
                $data['response'] = true;
                $user = $this->CustomModel->getwhere($this->users_table,$where)[0];

                if (password_verify($pass,$user->password) ) {

                    if ($user->user_status == 'active') {
                         $data['res'] = true;
                            $data['message'] = 'Success';
                            if ($user->user_type == 'admin') {
                                $data['redirect'] = base_url('admin/dashboard');
                            }else if ($user->user_type == 'user'){
                                $data['redirect'] = base_url('user/dashboard');
                            }

                            $user_data = array(
                                'user_id' => $user->user_id,
                                'user_type' => $user->user_type,
                                'user_status' => $user->user_status,
                                'username' => $user->username,
                                'isLoggedin' => True
                            );

                            $this->session->set($user_data);

                        }else {
                            $data['res'] = false;
                            $data['message'] = 'Account is inactive';
                        }
                    }else {
                             $data['res'] = false; 
                             $data['message'] = 'Invalid Password'; 
                        }
                }
                else {
                        $data['response'] = false ;
                        $data['message'] = 'Username Not Found'; 
                    }

                     echo json_encode($data);
            }
           
           
        }


    public function sign_out(){
        $array_items = ['user_id', 'user_type', 'user_status','isLoggedin'];
        $this->session->remove($array_items);
        return redirect()->to('login');
    }
    
}
