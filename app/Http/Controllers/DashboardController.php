<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BasicController;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index()
    {
        $date = [];        
        if (Session::has('user_id')) {
            $basic = new BasicController();
            $date['Memnu'] = $basic->Permissions();
            return view('dashboard',$date);
        }else{
            return view('Login',);
        }
        
    }
}
