<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class DashboardController extends BaseController
{
    protected $session;
    protected $session_id;

    public function __construct()
    {
        

       $this->session = \Config\Services::session();
       $this->session_id = $this->session->get('user_id');

    
        

    }
    public function index()
    {   

        if ($this->session->get('user_type') == 'admin') {
            $data['title'] = 'Dashboard';
            $data['session'] = $this->session;
            return view('admin/dashboard/index',$data);
        }else {
           return redirect()->back();
        }
      
    }
}
