<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

class DashboardController extends BaseController
{
    protected $session;

    public function __construct()
    {
       $this->session = \Config\Services::session();
    }

    public function index()
    {
        if ($this->session->get('user_type') == 'user') {
        $data['title'] = 'Dashboard';
       
        return view('user/dashboard/index',$data);
        }else {
           return redirect()->back();
        }
    }
}
