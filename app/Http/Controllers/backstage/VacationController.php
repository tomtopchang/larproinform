<?php

namespace App\Http\Controllers\Backstage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\BasicController;
use Illuminate\Support\Facades\Session;
use App\Models\Vacation;
use App\Models\Personnel;

class VacationController extends Controller
{
    public function index()
    {
        $date = [];        
        if (Session::has('user_id')) {
            $basic = new BasicController();
            $date['Memnu'] = $basic->Permissions();
            if (session('role') <= 2) {
                $date['info'] = Vacation::all();
            }else{
                $date['info'] = Vacation::where('pno', session('user_id'))->get();
            }        

            return view('/Vacation/Vacation_Index',$date);
        }else{
            return view('Login',);
        }
        
    }
    public function Add(){
        if (Session::has('user_id')) {
            $basic = new BasicController();
            $date['Memnu'] = $basic->Permissions();
            $date['vtypelist'] = array(
                '事假' => '0', 
                '公假' => '1',
                '病假' => '2',
                '特休' => '3',
                '補休' => '4',
                '喪假' => '5',
                '婚假' => '6',
            );
            $date['per'] = Personnel::where('pno', trim(session('user_id')))->get();   
            return view('/Vacation/Vacation_Add',$date);
        }else{
            return view('Login');
        }
    }

    public function Create(Request $request){
        if (Session::has('user_id')) {

            $error_messge = "";
            $post = $request->all();
            if ($post){
                if (trim($post['vtype']) === ''){
                    $error_messge .= "假別"; 
                }
                if (trim($post['vsday']) === ''){
                    if ($error_messge === ''){
                        $error_messge .= "請假起日期時間"; 
                    }else{
                        $error_messge .= "、請假起日期時間"; 
                    }                
                }
                if (trim($post['veday']) === ''){
                    if ($error_messge === ''){
                        $error_messge .= "請假迄日期時間"; 
                    }else{
                        $error_messge .= "、請假迄日期時間"; 
                    }                
                }
                if (trim($post['sumday']) === ''){
                    if ($error_messge === ''){
                        $error_messge .= "請假天數"; 
                    }else{
                        $error_messge .= "、請假天數"; 
                    }                
                }
                if (trim($post['sumhour']) === ''){
                    if ($error_messge === ''){
                        $error_messge .= "請假時數"; 
                    }else{
                        $error_messge .= "、請假時數"; 
                    }                
                }
                if (trim($post['reason']) === ''){
                    if ($error_messge === ''){
                        $error_messge .= "請假事由"; 
                    }else{
                        $error_messge .= "、請假事由"; 
                    }                
                }
                if ($error_messge === ''){
                   
                    Vacation::create($post);
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
            $date['info'] = Vacation::where('id', trim($request->id))->get();
            $date['vtypelist'] = array(
                '事假' => '0', 
                '公假' => '1',
                '病假' => '2',
                '特休' => '3',
                '補休' => '4',
                '喪假' => '5',
                '婚假' => '6',
            );
            $date['per'] = Personnel::where('pno', trim(session('user_id')))->get();   
            return view('/Vacation/Vacation_Mod',$date);
        }else{
            return view('Login');
        }
    }

    public function Edit(Request $request){
        if (Session::has('user_id')) {

            $error_messge = "";
            $post = $request->all();
            if ($post){                
                if (trim($post['vtype']) === ''){
                    $error_messge .= "假別"; 
                }
                if (trim($post['vsday']) === ''){
                    if ($error_messge === ''){
                        $error_messge .= "請假起日期時間"; 
                    }else{
                        $error_messge .= "、請假起日期時間"; 
                    }                
                }
                if (trim($post['veday']) === ''){
                    if ($error_messge === ''){
                        $error_messge .= "請假迄日期時間"; 
                    }else{
                        $error_messge .= "、請假迄日期時間"; 
                    }                
                }
                if (trim($post['sumday']) === ''){
                    if ($error_messge === ''){
                        $error_messge .= "請假天數"; 
                    }else{
                        $error_messge .= "、請假天數"; 
                    }                
                }
                if (trim($post['sumhour']) === ''){
                    if ($error_messge === ''){
                        $error_messge .= "請假時數"; 
                    }else{
                        $error_messge .= "、請假時數"; 
                    }                
                }
                if (trim($post['reason']) === ''){
                    if ($error_messge === ''){
                        $error_messge .= "請假事由"; 
                    }else{
                        $error_messge .= "、請假事由"; 
                    }                
                }
                if ($error_messge === ''){
                    $id = trim($post['id']);
                    Vacation::where('id','=',$id )->
                    update([
                        'vtype' => $post['vtype'],
                        'vsday' => $post['vsday'],
                        'veday' => $post['veday'],
                        'sumday' => $post['sumday'],
                        'sumhour' => $post['sumhour'],
                        'reason' => $post['reason'],
                        'memo' => $post['memo'],
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
}
