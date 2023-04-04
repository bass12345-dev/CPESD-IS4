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
        $data['title'] = 'Dashboard';
        $data['session'] = $this->session;
        return view('user/dashboard/index',$data);
    }
}
