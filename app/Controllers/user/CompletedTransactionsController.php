<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

class CompletedTransactionsController extends BaseController
{
    public function index()
    {
        if (session()->get('user_type') == 'user') {
        $data['title'] = 'Completed Transactions';
        return view('user/transactions/completed/index',$data);
        }else {
           return redirect()->back();
        }
    }
}
