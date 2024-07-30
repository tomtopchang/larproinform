<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Peruser;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    //
    public function index()
    {
        return view('login');
    }
    public function login(Request $request)
    {
        $post = $request->all();
        $password = $post['password'];
        $perall = Peruser::where('account',trim($post['username']))->first();
      
        if ($perall){
            $name = $perall->name;    
            if (Hash::check($password, $perall->password) ){
                session::put([
                    'user_id' => $perall->account,
                    'role' => $perall->role,
                    'unit' => $perall->unit
                ]);
                Peruser::where('account',trim($post['username']))->update(['last_login' => now()]);
                return response()->json(['success' => 'true', 'info' => $name.'登入成功']);
            }else{
                return response()->json(['success' => 'false', 'error' => '帳號密碼錯誤']);
            }
        }else{
            return response()->json(['error' => 'true', 'error' => '帳號密碼錯誤']);
        }
       
    }

    public function logout(){
        Session::flush();
        return redirect()->route('homelogin');
    }
}
