<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Memnusidebar;
use Illuminate\Support\Facades\Session;

class BasicController extends Controller
{
    public function Permissions()
    {
        if (Session::has('user_id')) {
            $userrole = Role::where('id',trim(session('role')))->get();
            $menuItems = [];
            if ($userrole[0]->role == 0) {
                $count = Memnusidebar::count();
                for($i=1;$i<=$count;$i++){
                    $menuItems[] = Memnusidebar::where('id',trim($i))->get();                
                }
            }else{
                $userrolel = explode(',',$userrole->role);
                foreach ($userrolel as $k){                
                    $menuItems[] = Memnusidebar::where('id',trim($k))->get();               
                }
            }
            return $menuItems;
        }
        
        
    }
}
