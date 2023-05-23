<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use App\Models\Backend\OFFICE_INFO;
use App\Models\Backend\UserType;
use App\Models\Frontend\USER_MST;

class UserCreateController extends Controller
{
    public function add(){
        $usercreate = DB::select('SELECT * FROM IF_OFFICE_INFO ORDER BY OFFICE_CODE ASC');
        $usercreate1 = UserType::all();
        $usercreate2 = DB::select('SELECT USER_ID,NAME,USER_NAME,USER_PASSWORD,MOBILE,EMAIL,USER_TYPE,(SELECT USER_TYPE_DESC FROM IF_USER_TYPE_MST WHERE IF_USER_TYPE_MST.USER_TYPE=IF_USER_MST.USER_TYPE) AS USER_TYPE_NAME,OFFICE_CODE, (SELECT OFFICE_DESC FROM IF_OFFICE_INFO WHERE IF_OFFICE_INFO.OFFICE_CODE=IF_USER_MST.OFFICE_CODE) AS OFFICE_NAME, USER_CODE
        FROM IF_USER_MST ORDER BY USER_ID ASC');
        return view("backend.pages.usercreate.add",compact('usercreate','usercreate1','usercreate2'));
    }

    public function store(Request $request){
        $request->validate([
            'password' => 'required',
            'conpassword' => 'required|same:password'
        ]);
        // $primaryKey = USER_MST::select(DB::raw('COALESCE(max(USER_ID),0)+1 as id'))->first();
        $usercreate = [
            // 'USER_ID'             => (int)($primaryKey->id),
            'OFFICE_CODE'         => $request->officecode,
            'NAME'                => $request->username,
            'USER_TYPE'           => $request->usertype,
            'USER_NAME'           => $request->userid,
            'USER_PASSWORD'       => $request->password,
            'MOBILE'              => $request->mobileno,
            'EMAIL'               => $request->emailadrs
        ];
        USER_MST::insert($usercreate);
        return redirect()->back()->with('message','Data Added Successfully');
    }

    public function update(Request $request, $id){
        $usercreate = [
            'office_code'             => $request->office_code,
            'name'                    => $request->name,
            'user_type'               => $request->user_type,
            'user_name'               => $request->user_name,
            'mobile'                  => $request->mobile,
            'email'                   => $request->email,
        ];
        USER_MST::where('USER_ID', $id)->update($usercreate);
        return redirect()->back()->with('message','Data Updated Successfully')->withFragment('updated-row');
    }

    public function delete($id){
        USER_MST::where('USER_ID', $id)->delete();
        return redirect()->back()->with('error','Data Deleted')->withFragment('updated-row');
    }
}

