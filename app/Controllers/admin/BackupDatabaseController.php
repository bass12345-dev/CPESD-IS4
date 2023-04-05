<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class BackupDatabaseController extends BaseController
{
    public function index()
    {
        
         if (session()->get('user_type') == 'admin') {
            $data['title'] = 'Back Up Database';
            return view('admin/back_up_database/index',$data);
        }else {
           return redirect()->back();
        }
    }
}
