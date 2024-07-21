<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Peruser;

class AdminController extends Controller
{
    //
    public function showLoginForm()
    {
        return view('Admin.login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);
        $username = $request->input('username');
        $userpass = $request->input('Password');
        $perall = DB::table('peruser')->where('account',trim($username))->get();

        $peracc = $perall->map(function($perall) {
            return $perall->account;
        });
        $perpss = $perall->map(function($perall) {
            return $perall->password;
        });

        if ($peracc->isNotEmpty()){
            if (($peracc === $username) && (Hash::check($userpass, $perpss)) ){
                return response()->json(['success' => 'true', 'info' => $peracc .'登入成功']);
            }else{
                return response()->json(['success' => 'false', 'error' => '帳號密碼錯誤1']);
            }
        }else{
            return response()->json(['success' => 'false', 'error' => '帳號密碼錯誤2']);
        }
        

       // return response()->json(['success' => 'true', 'info' => $peracc .'登入成功']);
       
    }
}
