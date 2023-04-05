<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class ResponsibleSectionController extends BaseController
{
    public function index()
    {
         if (session()->get('user_type') == 'admin') {
            $data['title'] = 'Responsible Section';
            return view('admin/responsible_section/index',$data);
        }else {
           return redirect()->back();
        }
    }
}
