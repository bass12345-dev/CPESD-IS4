<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class DashboardController extends BaseController
{
    protected $session;
    public $request;


    public function __construct()
    {
        

    
       
       

    }
    public function index()
    {   

        if (session()->get('user_type') == 'admin') {
            $data['title'] = 'Dashboard';
            return view('admin/dashboard/index',$data);
        }else {
           return redirect()->back();
        }
      
    }
}
