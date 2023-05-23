<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use App\Models\Backend\ALLOC_MST;
use App\Models\Backend\ALLOC_DTL;
use App\Models\Backend\PO_MST;
use App\Models\Backend\OFFICE_INFO;
use App\Models\Backend\REQ_MST;
use App\Models\Backend\REQ_DTL;
use App\Models\Frontend\USER_MST;
use App\Models\Backend\PO_DTL;
use Session;

class AllocationController extends Controller
{
    public function add(){
        $alloc = DB::select('SELECT * FROM IF_PO_MST WHERE REF_NO IS NOT NULL');
        $alloc1 = DB::select('SELECT IF_ALLOC_MST.ALLOC_ID,IF_ALLOC_MST.ALLOC_NO,IF_ALLOC_MST.ALLOC_DATE,IF_ALLOC_MST.DELIVERY_DATE,IF_ALLOC_MST.DELIVERY_OFFICE,IF_ALLOC_MST.LVL_CODE,IF_ALLOC_MST.LVL1_USER_ID,IF_ALLOC_MST.LVL2_USER_ID,IF_ALLOC_MST.LVL3_USER_ID,IF_ALLOC_MST.LVL4_USER_ID,IF_ALLOC_MST.OFFICE_CODE,IF_ALLOC_MST.PROJECT_TYPE,IF_ALLOC_MST.REF_NO,IF_ALLOC_MST.REMARKS,IF_ALLOC_MST.TRANSACTION_TYPE, IF_ALLOC_MST.PO_NO, IF_PO_MST.REF_NO AS PO_REF_NO,
        IF_PO_MST.PO_DATE  FROM IF_ALLOC_MST,IF_PO_MST WHERE IF_ALLOC_MST.PO_NO = IF_PO_MST.PO_NO');

        $userdata = USER_MST::where('user_id', '=' , Session::get('loginId'))->first();

        return view("backend.pages.allocation.add",compact('alloc','alloc1'));
    }

    public function getPoNo($id){
        $alloc = PO_MST::where('po_id',$id)->first();
        return response()->json([
            'alloc' => $alloc
        ]);
    }

    public function store(Request $request){
        $userdata = USER_MST::where('user_id', '=' , Session::get('loginId'))->first();
        $alloc = [
            'p_ALLOC_NO'                 => $request->p_ALLOC_NO,
            'p_REF_NO'                   => $request->p_REF_NO,
            'p_ALLOC_DATE'               => $request->p_ALLOC_DATE,
            'p_PO_NO'                    => $request->p_PO_NO,
            'p_REMARKS'                  => $request->p_REMARKS,
            'p_Office_code'              => $userdata->office_code
        ];
        $alloc1 = Http::asForm()->post("http://localhost/iFLOW/iflow_api/dpd_ALLOC_MST_INSERT.php", $alloc);
        return redirect()->Route("allocation.edit",$alloc['p_ALLOC_NO'])->with('message','Data Added Successfully');
    }

    public function show(){
        $alloc = DB::select('SELECT IF_ALLOC_MST.ALLOC_ID,IF_ALLOC_MST.ALLOC_NO,IF_ALLOC_MST.ALLOC_DATE,IF_ALLOC_MST.DELIVERY_DATE,IF_ALLOC_MST.DELIVERY_OFFICE,IF_ALLOC_MST.LVL_CODE,IF_ALLOC_MST.LVL1_USER_ID,IF_ALLOC_MST.LVL2_USER_ID,IF_ALLOC_MST.LVL3_USER_ID,IF_ALLOC_MST.LVL4_USER_ID,IF_ALLOC_MST.OFFICE_CODE,IF_ALLOC_MST.PROJECT_TYPE,IF_ALLOC_MST.REF_NO,IF_ALLOC_MST.REMARKS,IF_ALLOC_MST.TRANSACTION_TYPE, IF_ALLOC_MST.PO_NO, IF_PO_MST.REF_NO AS PO_REF_NO, IF_PO_MST.PO_DATE  FROM IF_ALLOC_MST,IF_PO_MST WHERE IF_ALLOC_MST.PO_NO = IF_PO_MST.PO_NO');
        
        return view("backend.pages.allocation.show",compact('alloc'));
    }

    public function edit($id){
        $alloc = ALLOC_MST::where('alloc_no',$id)->first();
        $alloc1 = DB::select('SELECT * FROM IF_PO_MST WHERE REF_NO IS NOT NULL');
        $alloc2 = $alloc->alloc_id;

        $alloc3 = DB::select('SELECT ALLOC_NO, item_code, ITEM_NAME, UNIT_CODE, MSR_NAME, sum(nvl(PO_qnTY,0)) PO_qnTY,sum(nvl(alloc_qnty,0)) alloc_qnty, sum(PO_qnTY)-sum(alloc_qnty) Bal_qnty from (select A.ALLOC_NO,c.item_code,D.ITEM_NAME,D.UNIT_CODE,MSR_NAME,C.QNTY  PO_qnTY, (select sum(b.alloc_qnty) from IF_ALLOC_dtl b where A.ALLOC_NO=B.ALLOC_NO and C.ITEM_CODE=B.ITEM_CODE) alloc_qnty from IF_ALLOC_MST  a, if_po_dtl c, if_item_mst d, IF_MSR_UNIT_MST e where a.ALLOC_NO = ? and A.PO_NO=c.po_no and c.ITEM_CODE=D.ITEM_CODE
        and D.UNIT_CODE=E.MSR_CODE) group by  ALLOC_NO,item_code,ITEM_NAME,UNIT_CODE,MSR_NAME', [$id]);

        $userdata = USER_MST::where('user_id', '=' , Session::get('loginId'))->first();

        return view("backend.pages.allocation.edit", compact('alloc','alloc1','alloc3','userdata'));
    }

    public function details($id,$id2){
        $alloc = ALLOC_MST::where('alloc_no',$id)->first();
        $alloc1 = DB::select('SELECT * FROM IF_PO_MST WHERE REF_NO IS NOT NULL');
        $alloc2 = DB::select('SELECT * FROM IF_OFFICE_INFO ORDER BY OFFICE_CODE ASC');

        $alloc3 = $alloc->alloc_id;

        // $alloc4 = [
        //     'p_ALLOC_NO'                 => $id
        // ];
        // $allocs = Http::asForm()->post("http://localhost/iFLOW/iflow_api/dpd_ALLOC_ITEM_SUM.php", $alloc4);
        // $allocs1 = json_decode($allocs);
        // $myCollection = collect($allocs1);
        // $results = $myCollection->first();
          
        // $alloc4 = DB::select('SELECT ALLOC_NO,ALLOC_DATE,REF_NO,REMARKS,item_code,ITEM_NAME,UNIT_CODE,MSR_NAME,  sum(nvl(PO_qnTY,0)) PO_qnTY,sum(nvl(alloc_qnty,0)) alloc_qnty, sum(PO_qnTY)-sum(alloc_qnty) Bal_qnty from (select A.ALLOC_NO,A.ALLOC_DATE,A.REF_NO,A.REMARKS,c.item_code,D.ITEM_NAME,D.UNIT_CODE,MSR_NAME,C.QNTY  PO_qnTY, (select b.alloc_qnty from IF_ALLOC_dtl b where A.ALLOC_NO=B.ALLOC_NO and C.ITEM_CODE=B.ITEM_CODE ) alloc_qnty from  IF_ALLOC_MST  a, if_po_dtl c, if_item_mst d, IF_MSR_UNIT_MST e where a.ALLOC_NO = ? AND c.ITEM_CODE = ?  and A.PO_NO=c.po_no and c.ITEM_CODE=D.ITEM_CODE and D.UNIT_CODE=E.MSR_CODE) group by  ALLOC_NO,ALLOC_DATE,REF_NO,REMARKS,item_code,ITEM_NAME,UNIT_CODE,MSR_NAME',[$id,$id2]);
        // $myCollection = collect($alloc4);
        // $results = $myCollection->first();

        $alloc4 = DB::select('SELECT A.ALLOC_NO, A.ALLOC_DATE, A.REF_NO, A.REMARKS, c.item_code, D.ITEM_NAME, D.UNIT_CODE, MSR_NAME, C.QNTY  PO_qnTY from  IF_ALLOC_MST  a, if_po_dtl c, if_item_mst d, IF_MSR_UNIT_MST e where a.ALLOC_NO = ? AND c.ITEM_CODE = ? and A.PO_NO=c.po_no and c.ITEM_CODE=D.ITEM_CODE and D.UNIT_CODE=E.MSR_CODE', [$id,$id2]);
        $myCollection = collect($alloc4);
        $results = $myCollection->first();

        $alloc5 = DB::select('SELECT a.OFFICE_CODE, C.OFFICE_DESC,  b.ITEM_CODE, d.ITEM_NAME, b.REQ_NO, b.QNTY  FROM IF_REQ_MST a, IF_REQ_DTL b, IF_OFFICE_INFO c, IF_ITEM_MST d where a.REQ_NO = b.REQ_NO and a.OFFICE_CODE = c.OFFICE_CODE and b.ITEM_CODE=d.ITEM_CODE and  b.ITEM_CODE = ?',[$id2]);

        $userdata = USER_MST::where('user_id', '=' , Session::get('loginId'))->first();

        $alloc12 = $alloc->po_no;
        $alloc13 = PO_DTL::where('po_no', $alloc12)->where('item_code',$id2)->first();
        $alloc8 = ALLOC_DTL::where('alloc_no',$id)->first();
        if($alloc8==!null){
            $alloc9 = $alloc->alloc_no;
            $alloc10 = $alloc13->item_code;
            // $alloc11 = $alloc8->req_no;

            // $alloc11 = REQ_MST::where('req_no',$alloc10)->first();
            // $alloc12 = $alloc11->req_no;

            // $alloc6 = DB::select('SELECT A.ALLOC_NO,b.item_code,D.ITEM_NAME,D.UNIT_CODE ,C.QNTY PO_qnTY,B.alloc_qnty alloc_qnty,B.REQ_QNTY,(B.REQ_QNTY-B.alloc_qnty) AS UNALLOCATED_QUANTITY,B.REQ_NO,B.REMARKS, F.OFFICE_CODE, G.OFFICE_DESC from IF_ALLOC_MST  a, if_alloc_dtl b, if_po_dtl c, if_item_mst d, IF_MSR_UNIT_MST e,IF_REQ_MST f,IF_OFFICE_INFO g where a.ALLOC_NO = ? and A.PO_NO=c.po_no and A.ALLOC_NO=B.ALLOC_NO and B.ITEM_CODE=C.ITEM_CODE and B.ITEM_CODE=D.ITEM_CODE and D.UNIT_CODE=E.MSR_CODE and F.OFFICE_CODE=G.OFFICE_CODE and b.ALLOC_NO = ? and b.req_NO = ? and f.req_NO = ?',[$id,$alloc9,$alloc10,$alloc12]);

            $alloc6 = DB::select('SELECT A.ALLOC_NO, B.ALLOC_DTL_ID, b.item_code, D.ITEM_NAME, D.UNIT_CODE, C.QNTY PO_qnTY, B.alloc_qnty alloc_qnty, B.REQ_QNTY, (B.REQ_QNTY-B.alloc_qnty) AS UNALLOCATED_QUANTITY, B.REQ_NO, B.REMARKS, F.OFFICE_CODE, G.OFFICE_DESC from IF_ALLOC_MST  a, if_alloc_dtl b, if_po_dtl c, if_item_mst d, IF_MSR_UNIT_MST e, IF_REQ_MST f, IF_OFFICE_INFO g where a.ALLOC_NO= ? and A.PO_NO=c.po_no and A.ALLOC_NO=B.ALLOC_NO and B.ITEM_CODE=C.ITEM_CODE and B.ITEM_CODE=D.ITEM_CODE and D.UNIT_CODE=E.MSR_CODE and F.OFFICE_CODE = G.OFFICE_CODE and B.REQ_NO = F.REQ_NO and b.item_code = ?', [$alloc9,$alloc10]);

            return view("backend.pages.allocation.details", compact('results','alloc','alloc1','alloc2','alloc4','alloc5','alloc6','alloc8','userdata'));
        }else{
            return view("backend.pages.allocation.details", compact('results','alloc','alloc1','alloc2','alloc4','alloc5','alloc8','userdata'));
        }
    }

    public function showreport($id){
        $alloc = [
            'p_alloc_no'                 => $id
        ];
        $alloc1 = Http::asForm()->post("http://localhost/iFLOW/iflow_api/dpd_alloc_coll_hdr.php", $alloc);
        $alloc2 = json_decode($alloc1, true);
        $columns = array_keys($alloc2[0]);

        $staticColumns = array_slice($columns, 0, 5);
        $dynamicColumns = array_slice($columns, 5);

        return view("backend.pages.allocation.show_report", compact('alloc2','staticColumns','dynamicColumns'));
    }

    public function update(Request $request, $id){
        $alloc = [
            'alloc_no'                  => $request->alloc_no,
            'ref_no'                    => $request->ref_no,
            'alloc_date'                => $request->alloc_date,
            'remarks'                   => $request->remarks
        ];
        ALLOC_MST::where('alloc_id', $id)->update($alloc);
        return redirect()->route("allocation.show")->with('message','Data Updated Successfully');
    }

    public function office($id,$id2){
        // $alloc = REQ_MST::where('office_code',$id)->first();
        // $alloc1 = $alloc->office_code;
        // $alloc2 = DB::select('SELECT IF_REQ_MST.OFFICE_CODE,IF_REQ_MST.REQ_NO,IF_REQ_DTL.ITEM_CODE, (SELECT ITEM_NAME FROM IF_ITEM_MST WHERE IF_ITEM_MST.ITEM_CODE = IF_REQ_DTL.ITEM_CODE) AS ITEM_NAME, IF_REQ_DTL.QNTY FROM IF_REQ_MST,IF_REQ_DTL WHERE IF_REQ_MST.REQ_NO = IF_REQ_DTL.REQ_NO AND IF_REQ_MST.OFFICE_CODE = ?',[$id]);

        $alloc2 = DB::select('SELECT IF_REQ_MST.OFFICE_CODE,IF_REQ_MST.REQ_NO,IF_REQ_DTL.ITEM_CODE, (SELECT ITEM_NAME FROM IF_ITEM_MST WHERE IF_ITEM_MST.ITEM_CODE = IF_REQ_DTL.ITEM_CODE) AS ITEM_NAME, 
        IF_REQ_DTL.QNTY FROM IF_REQ_MST,IF_REQ_DTL WHERE IF_REQ_MST.REQ_NO = IF_REQ_DTL.REQ_NO  AND IF_REQ_MST.OFFICE_CODE = ? AND IF_REQ_DTL.ITEM_CODE = ?',[$id,$id2]);
        
        return response()->json([
            'alloc' => $alloc2
        ]);
    }

    public function item($id){
        $alloc = REQ_DTL::where('req_no',$id)->first();
        $alloc1 = $alloc->req_no;
        $alloc2 = DB::select('SELECT ITEM_CODE,QNTY,REQ_DTL_ID,UNIT_CODE,REQ_NO,(SELECT ITEM_NAME FROM IF_ITEM_MST WHERE IF_REQ_DTL.ITEM_CODE = IF_ITEM_MST.ITEM_CODE) AS ITEM_NAME  FROM IF_REQ_DTL WHERE REQ_NO= ?',[$alloc1]);
        
        return response()->json([
            'alloc' => $alloc2
        ]);
    }

    public function quantity($id){
        $alloc = REQ_DTL::where('item_code',$id)->get();
        return response()->json([
            'alloc' => $alloc
        ]);
    }

    public function storedtl(Request $request, $id,$id2){
        $item = $request->item;
        $parts = explode("~", $item);
        $req_item_code = $parts[0];

        $office = $request->office_code;
        $parts1 = explode("~", $office);
        $req_office_code = $parts1[0];

        $alloc = ALLOC_MST::where('alloc_no', $id)->first();
        $alloc2 = $alloc->po_no;
        $alloc3 = PO_DTL::where('po_no', $alloc2)->where('item_code',$id2)->first();
        $allocdtl = [
            'p_alloc_no'                 => $alloc->alloc_no,
            'p_ITEM_CODE'                => $alloc3->item_code,
            'p_UNIT_CODE'                => $alloc3->unit_code,
            'p_req_item_code'            => $req_item_code,
            'p_req_qnty'                 => $request->qnty,
            'p_alloc_qnty'               => $request->p_QUANTITY_ALLOCATED,
            'p_req_no'                   => $request->req_no,
            'p_REMARKS'                  => $request->p_REMARKS,
            'p_Office_code'              => $req_office_code
        ];
        $allocdtl1 = Http::asForm()->post("http://localhost/iFLOW/iflow_api/dpd_alloc_dtl_INSERT.php", $allocdtl,$alloc);
        return redirect()->back()->with('message','Data Added Successfully')->withFragment('updated-row');
    }

    public function updatedtl(Request $request, $id){
        $office = $request->office;
        $parts = explode("~", $office);
        $office_code = $parts[0];

        $item = $request->item_code;
        $parts = explode("~", $item);
        $item_code = $parts[0];

        $alloc = [
            'office_code'               => $office_code,
            'req_no'                    => $request->requisition_no,
            'item_code'                 => $item_code,
            'req_qnty'                  => $request->req_qnty,
            'alloc_qnty'                => $request->alloc_qnty,
            'remarks'                   => $request->remarks
        ];
        ALLOC_DTL::where('alloc_dtl_id', $id)->update($alloc);
        return redirect()->back()->with('message','Data Updated Successfully')->withFragment('updated-row');
    }

    public function deletedtl($id){
        ALLOC_DTL::where('alloc_dtl_id', $id)->delete();
        return redirect()->back()->with('error','Data Deleted')->withFragment('updated-row');
    }
}
