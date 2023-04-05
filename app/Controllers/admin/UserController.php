<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class UserController extends BaseController
{
    public function index()
    {
        
         if (session()->get('user_type') == 'admin') {
            $data['title'] = 'Users';
            return view('admin/users/index',$data);
        }else {
           return redirect()->back();
        }
    }
}
