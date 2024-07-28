<?php

namespace App\Http\Controllers\backstage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\BasicController;
use Illuminate\Support\Facades\Session;

class ManagerController extends Controller
{
    public function index()
    {
        $date = [];        
        if (Session::has('user_id')) {
            $basic = new BasicController();
            $date['Memnu'] = $basic->Permissions();
            return view('/Manager/Manager_Index',$date);
        }else{
            return view('Login',);
        }
        
    }
}
