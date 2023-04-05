<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class TypeofActivityController extends BaseController
{
    public function index()
    {
         if (session()->get('user_type') == 'admin') {
            $data['title'] = 'Type of Activity';
            return view('admin/type_of_activity/index',$data);
        }else {
           return redirect()->back();
        }
    }
}
