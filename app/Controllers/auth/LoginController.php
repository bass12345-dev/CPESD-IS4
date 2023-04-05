<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;

class LoginController extends BaseController
{
    protected $session;

    public function __construct()
    {
       
       $this->session = \Config\Services::session();

        
    }

    public function index()
    {
   


        $data['title'] = 'Login';
        $data['session'] = $this->session;
        return view('auth/login',$data);
   
    }
}
