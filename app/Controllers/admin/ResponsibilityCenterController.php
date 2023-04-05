<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class ResponsibilityCenterController extends BaseController
{
    public function index()
    {
        if (session()->get('user_type') == 'admin') {
            $data['title'] = 'Responsibility Center';
            return view('admin/responsibility_center/index',$data);
        }else {
           return redirect()->back();
        }
    }
}
