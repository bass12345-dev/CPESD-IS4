<?php

namespace App\Controllers\Api;
use Ifsnop\Mysqldump\Mysqldump;

use App\Controllers\BaseController;

class BackupDB extends BaseController
{
    public function index()
    {
        try {
        $filename = date("Y-m-d h.i.s") . ' ' . 'cpesd-is' . '.sql';
        $dump = new Mysqldump('mysql:host=localhost;dbname=cpesd-is;port=3306', 'root', '');
        $dump->start(FCPATH .'/uploads/database/'.$filename);
        
        $data = array(
                'response' => true,
                'message' => 'Database Exported.');

        }catch (\Exception $e) {
            $data = array(
                'response' => false,
                'message'  => 'error');
        }

        echo json_encode($data);
             
    }


    public function get_database()
    {
        $dir = FCPATH . '/uploads/database/';
        $data = [];
        $file_data = scandir($dir);

        foreach ($file_data as $file) {

            if ($file === '.' OR $file === '..') {

                continue;
                // code...
            }else {
                
                $data[] = array(

                    'database' => $file
                );
            }
        }

        echo json_encode($data);
    }

}
