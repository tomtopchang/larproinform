<?php

namespace App\Http\Controllers\backstage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\BasicController;
use Illuminate\Support\Facades\Session;
use App\Models\Personnel;

class ManagerController extends Controller
{
    public function index()
    {
        $date = [];        
        if (Session::has('user_id')) {
            $basic = new BasicController();
            $date['Memnu'] = $basic->Permissions();
            if (session('role') <= 2) {
                $date['info'] = Personnel::all();
            }else{
                $date['info'] = Personnel::where('depname', session('unit'))->get();
            }        

            return view('/Manager/Manager_Index',$date);
        }else{
            return view('Login',);
        }
        
    }

    public function View(Request $request){

        if (Session::has('user_id')) {

            $basic = new BasicController();
            $date['Memnu'] = $basic->Permissions();
            $date['info'] = Personnel::where('id', trim($request->id))->get();
            return view('/Manager/Manager_View',$date);
        }else{
            return view('Login',);
        }
    }
}
