<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use App\Models\Backend\REQ_MST;
use App\Models\Backend\OFFICE_INFO;
use App\Models\Backend\ITEM_MST;
use App\Models\Backend\EMPLOYEE_MST;
use App\Models\Backend\REQ_DTL;
use App\Models\Frontend\USER_MST;
use Session;

class RequisitionController extends Controller
{
    public function add(){
        $requisition = DB::select('SELECT * FROM IF_OFFICE_INFO ORDER BY OFFICE_CODE ASC');
        $requisition1 = EMPLOYEE_MST::all();
        $userdata = USER_MST::where('user_id', '=' , Session::get('loginId'))->first();
        return view("backend.pages.requisition.add", compact('requisition','requisition1','userdata'));
    }

    public function store(Request $request){
        $requisition = [
            'p_req_NO'                 => $request->p_req_NO,
            'p_req_DATE'               => $request->p_req_DATE,
            'p_TRANSACTION_TYPE'       => $request->p_TRANSACTION_TYPE,
            'p_emp_CODE'               => $request->p_emp_CODE,
            'p_REC_NO'                 => $request->p_REC_NO,
            'p_rec_date'               => $request->p_rec_date,
            'p_REF_NO'                 => $request->p_REF_NO,
            'p_REMARKS'                => $request->p_REMARKS,
            'p_Office_code'            => $request->p_Office_code
        ];
        $requisition1 = Http::asForm()->post("http://localhost/iFLOW/iflow_api/dpd_req_MST_INSERT.php", $requisition);
        return redirect()->Route("requisition.edit",$requisition['p_req_NO'])->with('message','Data Added Successfully');
    }

    public function show(){
        $userdata = USER_MST::where('user_id', '=' , Session::get('loginId'))->first();
        $requisition = Http::get("http://localhost/iFLOW/iflow_api/dpd_req_MST_SELECT.php")->collect();
        return view("backend.pages.requisition.show", compact('requisition','userdata'));
    }

    public function edit($id){
        $requisition = REQ_MST::where('req_no', $id)->first();
        $requisition1 = DB::select('SELECT * FROM IF_OFFICE_INFO ORDER BY OFFICE_CODE ASC');
        $requisition2 = ITEM_MST::all();
        $requisition3 = EMPLOYEE_MST::all();
        $requisition4 = DB::select('SELECT * FROM IF_MSR_UNIT_MST');
        $requisition5 = $requisition->req_no;

        $requisition6 = DB::select('SELECT REQ_ID,QNTY, ITEM_CODE,(SELECT IF_ITEM_MST.ITEM_NAME FROM IF_ITEM_MST WHERE IF_REQ_DTL.ITEM_CODE=IF_ITEM_MST.ITEM_CODE ) AS ITEM_NAME,REMARKS, REQ_DTL_ID,REQ_NO, UNIT_CODE, (SELECT IF_MSR_UNIT_MST.MSR_NAME FROM IF_MSR_UNIT_MST WHERE IF_REQ_DTL.UNIT_CODE=IF_MSR_UNIT_MST.MSR_CODE ) AS UNIT_NAME FROM IF_REQ_DTL WHERE REQ_No = ?', [$requisition5]);
        
        $userdata = USER_MST::where('user_id', '=' , Session::get('loginId'))->first();
        
        return view("backend.pages.requisition.edit", compact('requisition','requisition1','requisition2','requisition3','requisition4','requisition6','userdata'));
    }

    public function update(Request $request, $id){
        $requisition = [
            'req_no'                   => $request->req_no,
            'req_date'                 => $request->req_date,
            'ref_no'                   => $request->ref_no,
            'office_code'              => $request->office_code,
            'emp_code'                 => $request->emp_code,
            'remarks'                  => $request->remarks,
            'rec_no'                   => $request->rec_no,
            'rec_date'                 => $request->rec_date
        ];
        REQ_MST::where('req_no', $id)->update($requisition);
        return redirect()->route("requisition.show")->with('message','Data Updated Successfully');
    }

    public function storedtl(Request $request, $id){
        $requisition = REQ_MST::where('req_no', $id)->first();

        $requisitiondtl = [
            'p_req_ID'                  => $requisition->req_id,
            'p_req_NO'                  => $requisition->req_no,
            'p_ITEM_CODE'               => $request->p_ITEM_CODE,
            'p_UNIT_CODE'               => $request->p_UNIT_CODE,
            'p_QNTY'                    => $request->p_QNTY,
            'p_REMARKS'                 => $request->p_REMARKS
        ];
        $requisitiondtl1 = Http::asForm()->post("http://localhost/iFLOW/iflow_api/dpd_req_dtl_INSERT.php", $requisitiondtl, $requisition);
        return redirect()->back()->with('message','Data Added Successfully')->withFragment('updated-row');
    }

    public function updatedtl(Request $request, $id){
        $requisition = [
            'item_code'                 => $request->item_code,
            'unit_code'                 => $request->unit_code,
            'qnty'                      => $request->qnty,
            'remarks'                   => $request->remarks
        ];
        REQ_DTL::where('req_dtl_id', $id)->update($requisition);
        return redirect()->back()->with('message','Data Updated Successfully')->withFragment('updated-row');
    }

    public function deletedtl($id){
        REQ_DTL::where('req_dtl_id', $id)->delete();
        return redirect()->back()->with('error','Data Deleted')->withFragment('updated-row');
    }
}
