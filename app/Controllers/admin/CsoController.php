<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class CsoController extends BaseController
{
    public function index()
    {

        if (session()->get('user_type') == 'admin') {
            $data['title'] = 'CSO';
            $data['type_of_cso'] = ['PO', 'Coop','NSC'];
            $data['barangay'] = ['Tuyabang Bajo','Tuyabang Alto','Tuyabang Proper'];
            return view('admin/cso/index',$data);
        }else {
           return redirect()->back();
        }
    }
}
