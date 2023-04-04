<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;

class LoginController extends BaseController
{
    protected $session;

    public function __construct()
    {
       
       $this->session = \Config\Services::session();

        if ($this->session->get('user_id')) {
            
            if ($this->session->get('user_type') == 'admin') {
                
                 return redirect()->to('');

            }else if ($this->session->get('user_type') == 'user') {
               
               return redirect()->to('user/dashboard');
            }

            
        }

    }

    public function index()
    {
        $data['title'] = 'Login';
        $data['session'] = $this->session;
        return view('auth/login',$data);
    }
}
