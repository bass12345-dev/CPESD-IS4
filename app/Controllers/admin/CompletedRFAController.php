<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class CompletedRFAController extends BaseController
{
    public function index()
    {
        if (session()->get('user_type') == 'admin') {
            $data['title'] = 'Completed RFA';
            return view('admin/rfa/completed/index',$data);
        }else {
           return redirect()->back();
        }
    }
}
