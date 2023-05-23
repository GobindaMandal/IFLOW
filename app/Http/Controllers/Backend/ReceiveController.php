<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use App\Models\Backend\RI_MST;
use App\Models\Backend\PO_MST;
use App\Models\Backend\PO_DTL;
use App\Models\Backend\ITEM_MST;
use App\Models\Backend\RI_DTL;
use App\Models\Frontend\USER_MST;
use Session;

class ReceiveController extends Controller
{
    public function add(){
        $receive = DB::select('SELECT * FROM IF_PO_MST ORDER BY PO_NO ASC');
        $userdata = USER_MST::where('user_id', '=' , Session::get('loginId'))->first();
        return view("backend.pages.receive.add", compact('receive','userdata'));
    }

    public function store(Request $request){
        $receive = [
                'p_RI_NO'                 => $request->p_RI_NO,
                'p_TRANSACTION_TYPE'      => $request->p_TRANSACTION_TYPE,
                'p_RI_DATE'               => $request->p_RI_DATE,
                'p_DELIVERY_DATE'         => $request->p_DELIVERY_DATE,
                'p_PO_NO'                 => $request->p_PO_NO,
                'p_REMARKS'               => $request->p_REMARKS,
                'p_SUPP_CODE'             => $request->p_SUPP_CODE,
                'p_DELIVERY_OFFICE'       => $request->p_DELIVERY_OFFICE,
                'p_REF_NO'                => $request->p_REF_NO
            ];
        $receive1 = Http::asForm()->post("http://localhost/iFLOW/iflow_api/dpd_RI_MST_INSERT.php", $receive);
        return redirect()->Route("receive.edit",$receive['p_RI_NO'])->with('message','Data Added Successfully');
    }

    public function show(){
        $userdata = USER_MST::where('user_id', '=' , Session::get('loginId'))->first();
        $receive = RI_MST::all();
        // $receive = Http::get("http://localhost/iFLOW/iflow_api/dpd_RI_MST_SELECT.php")->collect();
        return view("backend.pages.receive.show", compact('receive','userdata'));
    }

    public function edit($id){
        $receive = RI_MST::where('ri_no', $id)->first();
        $receive1 = DB::select('SELECT * FROM IF_PO_MST ORDER BY PO_NO ASC');
        $receive2 = ITEM_MST::all();
        $receive3 = DB::select('SELECT * FROM IF_MSR_UNIT_MST');
        $receive4 = $receive->po_no;
        $receive5 = RI_DTL::where('po_no', $receive4)->first();

        $receive6 = DB::select('SELECT ITEM_CODE, (SELECT IF_ITEM_MST.ITEM_NAME FROM IF_ITEM_MST WHERE IF_PO_DTL.ITEM_CODE=IF_ITEM_MST.ITEM_CODE ) AS ITEM_NAME, PO_NO FROM IF_PO_DTL WHERE PO_NO = ?', [$receive4]);

        $receive7 = DB::select('SELECT IF_RI_DTL.RI_ID, IF_RI_DTL.ITEM_CODE, (SELECT IF_ITEM_MST.ITEM_NAME FROM IF_ITEM_MST WHERE IF_RI_DTL.ITEM_CODE=IF_ITEM_MST.ITEM_CODE ) AS ITEM_NAME, IF_RI_DTL.RATE, IF_RI_DTL.QUANTITY_RECEIVED, IF_RI_DTL.QUANTITY_ACCEPTED, IF_RI_DTL.AMOUNT_ACCEPTED, IF_RI_DTL.QUANTITY_DISPUTED, IF_RI_DTL.AMOUNT_DISPUTED, IF_RI_DTL.REMARKS,IF_RI_DTL.UNIT_CODE,(SELECT IF_MSR_UNIT_MST.MSR_NAME FROM IF_MSR_UNIT_MST WHERE IF_RI_DTL.UNIT_CODE=IF_MSR_UNIT_MST.MSR_CODE ) AS UNIT_NAME,IF_RI_DTL.RI_DTL_ID,
        IF_RI_DTL.PO_QNTY, IF_RI_DTL.WARRANTY_PERIOD, IF_RI_DTL.PO_NO, IF_RI_DTL.RI_NO FROM IF_RI_DTL WHERE PO_NO = ?', [$receive4]);

        $userdata = USER_MST::where('user_id', '=' , Session::get('loginId'))->first();
        
        return view("backend.pages.receive.edit", compact('receive','receive1','receive3','receive6','receive7','userdata'));
    }

    public function update(Request $request, $id){
        $receive = [
            'ri_no'                      => $request->ri_no,
            'ri_date'                    => $request->ri_date,
            'po_no'                      => $request->po_no,
            'remarks'                    => $request->remarks,
            'ref_no'                     => $request->ref_no
        ];
        RI_MST::where('ri_id', $id)->update($receive);
        return redirect()->route("receive.show")->with('message','Data Updated Successfully');
    }

    public function delete(){
        
    }

    public function editdtl($id){
        $receive = DB::select('SELECT ITEM_CODE,QNTY,RATE,(SELECT IF_MSR_UNIT_MST.MSR_NAME FROM IF_MSR_UNIT_MST WHERE IF_PO_DTL.UNIT_CODE=IF_MSR_UNIT_MST.MSR_CODE ) AS UNIT_NAME FROM IF_PO_DTL WHERE ITEM_CODE= ?', [$id]);
        return response()->json([
            'status' => $receive
        ]);
    }

    public function storedtl(Request $request, $id){
        $receive = RI_MST::where('po_no', $id)->first();
       
        $receivedtl = [
            'p_ri_ID'                   => $receive->ri_id,
            'p_PO_NO'                   => $receive->po_no,
            'p_ITEM_CODE'               => $request->p_ITEM_CODE,
            'p_UNIT_CODE'               => $request->p_UNIT_CODE,
            'p_PO_QNTY'                 => $request->p_PO_QNTY,
            'p_rate'                    => $request->p_rate,
            'p_QUANTITY_RECEIVED'       => $request->p_QUANTITY_RECEIVED,
            'p_QUANTITY_ACCEPTED'       => $request->p_QUANTITY_ACCEPTED,
            'p_QUANTITY_DISPUTED'       => $request->p_QUANTITY_DISPUTED,
            'p_AMOUNT_ACCEPTED'         => $request->p_AMOUNT_ACCEPTED,
            'p_AMOUNT_DISPUTED'         => $request->p_AMOUNT_DISPUTED,
            'p_REMARKS'                 => $request->p_REMARKS,
            'p_Office_code'             => $request->p_Office_code,
            'p_USER'                    => $request->p_USER
            ];
        $receivedtl1 = Http::asForm()->post("http://localhost/iFLOW/iflow_api/dpd_ri_dtl_INSERT.php", $receivedtl,$receive);
        return redirect()->back()->with('message','Data Added Successfully')->withFragment('updated-row');
    }

    public function updatedtl(Request $request, $id){
        $receive = [
            'item_code'           => $request->item_code,
            'unit_code'           => $request->unit_code,
            'po_qnty'             => $request->po_qnty,
            'rate'                => $request->rate,
            'quantity_received'   => $request->quantity_received,
            'quantity_accepted'   => $request->quantity_accepted,
            'quantity_disputed'   => $request->quantity_disputed,
            'amount_accepted'     => $request->amount_accepted,
            'remarks'             => $request->remarks
        ];
        RI_DTL::where('ri_dtl_id', $id)->update($receive);
        return redirect()->back()->with('message','Data Updated Successfully')->withFragment('updated-row');
    }

    public function deletedtl($id){
        RI_DTL::where('ri_dtl_id', $id)->delete();
        // delete data dynamic
        return redirect()->back()->with('error','Data Deleted')->withFragment('updated-row');
    }
}
