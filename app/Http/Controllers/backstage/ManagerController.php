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
            $date['sexlist'] = array('男' => 'M', '女' => 'F');
            return view('/Manager/Manager_View',$date);
        }else{
            return view('Login');
        }
    }

    public function Add(){
        if (Session::has('user_id')) {
            $basic = new BasicController();
            $date['Memnu'] = $basic->Permissions();
            $date['sexlist'] = array('男' => 'M', '女' => 'F');
            return view('/Manager/Manager_Add',$date);
        }else{
            return view('Login');
        }
    }

    public function Create(Request $request){
        if (Session::has('user_id')) {

            $error_messge = "";
            $post = $request->all();
            if ($post){
                if (trim($post['pno']) === ''){
                    $error_messge .= "員工編號"; 
                }
                if (trim($post['cname']) === ''){
                    if ($error_messge === ''){
                        $error_messge .= "姓名"; 
                    }else{
                        $error_messge .= "、姓名"; 
                    }                
                }
                if (trim($post['idno']) === ''){
                    if ($error_messge === ''){
                        $error_messge .= "身分證字號"; 
                    }else{
                        $error_messge .= "、身分證字號"; 
                    }                
                }
                if (trim($post['depname']) === ''){
                    if ($error_messge === ''){
                        $error_messge .= "單位"; 
                    }else{
                        $error_messge .= "、單位"; 
                    }                
                }
                if (trim($post['jobname']) === ''){
                    if ($error_messge === ''){
                        $error_messge .= "職稱"; 
                    }else{
                        $error_messge .= "、職稱"; 
                    }                
                }
                if ($error_messge === ''){
                   
                    Personnel::create($post);
                    return response()->json(['success' => 'true', 'info' => '新增資料成功']);
                }else{
                    $error_messge .= "，欄位不得空白"; 
                    return response()->json(['success' => 'false', 'messge' => $error_messge]);
                } 
            }else{
                return response()->json(['success' => 'false', 'messge' =>'新增鏌誤']);
            }
              
        }else{
            return view('Login');
        }
    }

    public function Mod(Request $request){
        if (Session::has('user_id')) {
            $basic = new BasicController();
            $date['Memnu'] = $basic->Permissions();
            $date['info'] = Personnel::where('id', trim($request->id))->get();
            $date['sexlist'] = array('男' => 'M', '女' => 'F');
            return view('/Manager/Manager_Mod',$date);
        }else{
            return view('Login');
        }
    }

    public function Edit(Request $request){
        if (Session::has('user_id')) {

            $error_messge = "";
            $post = $request->all();
            if ($post){                
                if (trim($post['pno']) === ''){
                    $error_messge .= "員工編號"; 
                }
                if (trim($post['cname']) === ''){
                    if ($error_messge === ''){
                        $error_messge .= "姓名"; 
                    }else{
                        $error_messge .= "、姓名"; 
                    }                
                }
                if (trim($post['idno']) === ''){
                    if ($error_messge === ''){
                        $error_messge .= "身分證字號"; 
                    }else{
                        $error_messge .= "、身分證字號"; 
                    }                
                }
                if (trim($post['depname']) === ''){
                    if ($error_messge === ''){
                        $error_messge .= "單位"; 
                    }else{
                        $error_messge .= "、單位"; 
                    }                
                }
                if (trim($post['jobname']) === ''){
                    if ($error_messge === ''){
                        $error_messge .= "職稱"; 
                    }else{
                        $error_messge .= "、職稱"; 
                    }                
                }
                if ($error_messge === ''){
                    $id = trim($post['id']);
                    Personnel::where('id','=',$id )->
                    update([
                        'pno' => $post['pno'],
                        'cname' => $post['cname'],
                        'idno' => $post['idno'],
                        'birsday' => $post['birsday'],
                        'sex' => $post['sex'],
                        'address' => $post['address'],
                        'tel' => $post['tel'],
                        'depname' => $post['depname'],
                        'jobname' => $post['jobname'],
                        'inday' => $post['inday'],
                        'outday' => $post['outday'],
                    ]);
                    return response()->json(['success' => 'true', 'info' => '更新資料成功']);
                }else{
                    $error_messge .= "，欄位不得空白"; 
                    return response()->json(['success' => 'false', 'messge' => $error_messge]);
                } 
            }else{
                return response()->json(['success' => 'false', 'messge' =>'更新鏌誤']);
            }
              
        }else{
            return view('Login');
        }
    }

    public function Del(Request $request){
        if (Session::has('user_id')) {
            $basic = new BasicController();
            $date['Memnu'] = $basic->Permissions();
            Personnel::where('id', trim($request->id))->delete();
            if (session('role') <= 2) {
                $date['info'] = Personnel::all();
            }else{
                $date['info'] = Personnel::where('depname', session('unit'))->get();
            }        

            return view('/Manager/Manager_Index',$date);
        }else{
            return view('Login');
        }
    }
}
