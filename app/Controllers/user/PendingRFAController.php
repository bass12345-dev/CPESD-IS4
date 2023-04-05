<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

class PendingRFAController extends BaseController
{
    public function index()
    {
        
        if (session()->get('user_type') == 'user') {
        $data['title'] = 'Pending Transactions';
        return view('user/transactions/pending/index',$data);
        }else {
           return redirect()->back();
        }
    }
}
