<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Peruser;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    //
    public function showLoginForm()
    {
        return view('Admin.login');
    }
    public function login(Request $request)
    {
        $post = $request->all();
        $password = $post['password'];
        $perall = DB::table('peruser')->where('account',trim($post['username']))->first();
      
        if ($perall){
            $name = $perall->name;    
            if (Hash::check($password, $perall->password) ){
                Session::put('user', [
                    'id' =>$perall->id,
                    'name' => $name,
                    'email' => $perall->email
                ]);
                return response()->json(['success' => 'true', 'info' => $name.'登入成功']);
            }else{
                return response()->json(['success' => 'false', 'error' => '帳號密碼錯誤']);
            }
        }else{
            return response()->json(['error' => 'true', 'error' => '帳號密碼錯誤']);
        }
       
    }
}
