<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

class ActivityLogsController extends BaseController
{
    public function index()
    {
         if (session()->get('user_type') == 'user') {
        $data['title'] = 'Activity Logs';
        return view('user/activity_logs/index',$data);
        }else {
           return redirect()->back();
        }
    }
}
