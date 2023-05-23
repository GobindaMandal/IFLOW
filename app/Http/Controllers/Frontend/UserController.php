<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use App\Models\Frontend\USER_MST;
use Session;

class UserController extends Controller
{
    public function login(){
        return view('frontend.user.login');
    }

    public function loginuser(Request $request){
        $request->validate([
            'user_name'=>'required',
            'user_password'=>'required'
        ]);
        // $data = [
        //     'user_name'               =>$request->user_name,
        //     'user_password'           =>$request->user_password
        // ];
        // $user = Http::post("http://localhost/IFLOW_API/USER_LOGIN.php", $data);
        $user = USER_MST::where('USER_NAME', '=' , $request->user_name)->first();
        if($user){
            if(USER_MST::where('USER_PASSWORD', '=' , $request->user_password)->first()){
                $request->Session()->put('loginId', $user->user_id);
                return redirect("dashboard");
            }else{
                return back()->with('fail', 'Password Not Matches');
            }
        }
        else{
            return back()->with('fail', 'Invalid User');
        }
    }

    public function dashboard(){
        $userdata = array();
        if(Session::has('loginId')){
            $userdata = USER_MST::where('user_id', '=' , Session::get('loginId'))->first();
        }
        return view("backend.dashboard", compact('userdata'));
    }

    public function logout(){
        if(Session::has('loginId')){
            Session::pull('loginId');
        }
        return redirect("login");
    }

    public function add(){
        return view("backend.pages.user.add");
    }
}
