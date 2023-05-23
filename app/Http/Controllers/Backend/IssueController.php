<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use App\Models\Backend\OFFICE_INFO;
use App\Models\Backend\ISSUE_MST;
use App\Models\Backend\ITEM_MST;
use App\Models\Backend\ISSUE_DTL;
use App\Models\Backend\ALLOC_DTL;
use App\Models\Frontend\USER_MST;
use Session;

class IssueController extends Controller
{
    public function add(){
        $issue = DB::select('SELECT * FROM IF_OFFICE_INFO ORDER BY OFFICE_CODE ASC');
        $userdata = USER_MST::where('user_id', '=' , Session::get('loginId'))->first();
        return view("backend.pages.issue.add",compact('issue','userdata'));
    }

    public function allocNo($id){
        $issue = ALLOC_DTL::where('office_code',$id)->get();
        return response()->json([
            'issue' => $issue
        ]);
    }

    public function store(Request $request){
        $issue = [
            'p_issue_NO'                 => $request->p_issue_NO,
            'p_issue_DATE'               => $request->p_issue_DATE,
            'p_alloc_no'                 => $request->p_alloc_no,
            'p_Office_code'              => $request->p_Office_code,
            'p_REMARKS'                  => $request->p_REMARKS
        ];
        $issue1 = Http::asForm()->post("http://localhost/iFLOW/iflow_api/dpd_issue_MST_INSERT.php", $issue);
        return redirect()->Route("issue.edit",$issue['p_issue_NO'])->with('message','Data Added Successfully');
    }

    public function show(){
        $userdata = USER_MST::where('user_id', '=' , Session::get('loginId'))->first();
        $issue = Http::get("http://localhost/iFLOW/iflow_api/dpd_issue_MST_SELECT.php")->collect();
        return view("backend.pages.issue.show",compact('issue','userdata'));
    }

    public function edit($id){
        $issue = ISSUE_MST::where('issue_no', $id)->first();
        $issue1 = DB::select('SELECT * FROM IF_OFFICE_INFO ORDER BY OFFICE_CODE ASC');
        $issue2 = ITEM_MST::all();
        $issue3 = DB::select('SELECT * FROM IF_MSR_UNIT_MST');
        $issue4 = $issue->issue_no;
        
        $issue5 = DB::select('SELECT ISSUE_ID, ISSUE_QNTY, ITEM_CODE,(SELECT IF_ITEM_MST.ITEM_NAME FROM IF_ITEM_MST WHERE IF_ISSUE_DTL.ITEM_CODE=IF_ITEM_MST.ITEM_CODE ) AS ITEM_NAME,REMARKS, ALLOC_QNTY, ISSUE_DTL_ID,ALLOC_NO, ISSUE_NO, UNIT_CODE, (SELECT IF_MSR_UNIT_MST.MSR_NAME FROM IF_MSR_UNIT_MST WHERE IF_ISSUE_DTL.UNIT_CODE=IF_MSR_UNIT_MST.MSR_CODE ) AS UNIT_NAME FROM IF_ISSUE_DTL WHERE ISSUE_NO= ?', [$issue4]);

        $office_code = $issue->office_code;
        $issue6 = ALLOC_DTL::where('office_code', $office_code)->get();

        $userdata = USER_MST::where('user_id', '=' , Session::get('loginId'))->first();
        
        return view("backend.pages.issue.edit", compact('issue','issue1','issue2','issue3','issue4','issue5','issue6','userdata'));
    }

    public function update(Request $request, $id){
        $issue = [
            'issue_no'                  => $request->issue_no,
            'issue_date'                => $request->issue_date,
            'office_code'               => $request->office_code,
            'remarks'                   => $request->remarks
        ];
        ISSUE_MST::where('issue_no', $id)->update($issue);
        return redirect()->route("issue.show")->with('message','Data Updated Successfully');
    }

    public function storedtl(Request $request, $id){
        $issue = ISSUE_MST::where('issue_no', $id)->first();

        $issuedtl = [
            'p_issue_ID'                 => $issue->issue_id,
            'p_issue_NO'                 => $issue->issue_no,
            'p_alloc_no'                 => $issue->alloc_no,
            'p_ITEM_CODE'                => $request->p_ITEM_CODE,
            'p_UNIT_CODE'                => $request->p_UNIT_CODE,
            'p_alloc_QNTY'               => $request->p_alloc_QNTY,
            'p_issue_qnty'               => $request->p_issue_qnty,
            'p_REMARKS'                  => $request->p_REMARKS
        ];
        $issuedtl1 = Http::asForm()->post("http://localhost/iFLOW/iflow_api/dpd_issue_dtl_INSERT.php", $issuedtl,$issue);
        return redirect()->back()->with('message','Data Added Successfully')->withFragment('updated-row');
    }

    public function updatedtl(Request $request, $id){
        $issue = [
            'item_code'                 => $request->item_code,
            'unit_code'                 => $request->unit_code,
            'issue_qnty'                => $request->issue_qnty,
            'remarks'                   => $request->remarks
        ];
        ISSUE_DTL::where('issue_dtl_id', $id)->update($issue);
        return redirect()->back()->with('message','Data Updated Successfully')->withFragment('updated-row');
    }

    public function deletedtl($id){
        ISSUE_DTL::where('issue_dtl_id', $id)->delete();
        // delete data dynamic
        return redirect()->back()->with('error','Data Deleted')->withFragment('updated-row');
    }
}
