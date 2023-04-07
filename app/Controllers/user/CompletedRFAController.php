<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

class CompletedRFAController extends BaseController
{
    public function index()
    {
        if (session()->get('user_type') == 'user') {
        $data['title'] = 'Completed RFA';
        return view('user/rfa/completed/index',$data);
        }else {
           return redirect()->back();
        }
    }
}
