<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class ActivityLogsController extends BaseController
{
    public function index()
    {
        if (session()->get('user_type') == 'admin') {
            $data['title'] = 'Activity Logs';
            return view('admin/activity_logs/index',$data);
        }else {
           return redirect()->back();
        }
    }
}
