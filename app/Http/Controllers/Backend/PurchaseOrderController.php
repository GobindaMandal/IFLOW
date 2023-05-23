<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use App\Models\Backend\PO_MST;
use App\Models\Backend\SUPPLIER_MST;
use App\Models\Backend\OFFICE_INFO;
use App\Models\Backend\PO_DTL;
use App\Models\Backend\ITEM_MST;
use App\Models\Frontend\USER_MST;
use Session;

class PurchaseOrderController extends Controller
{
    public function add(){
        $purchase = SUPPLIER_MST::all();
        $purchase1 = DB::select('SELECT * FROM IF_OFFICE_INFO ORDER BY OFFICE_CODE ASC');
        $userdata = USER_MST::where('user_id', '=' , Session::get('loginId'))->first();
        return view("backend.pages.purchaseorder.add", compact('purchase','purchase1','userdata'));
    }

    public function store(Request $request){
        $userdata = USER_MST::where('user_id', '=' , Session::get('loginId'))->first();
        // $primaryKey = PO_MST::select(DB::raw('COALESCE(max(PO_ID),0)+1 as id'))->first();
        $purchase = [
                // 'PO_ID'                   => (int)($primaryKey->id),
                'p_PO_NO'                 => $request->p_PO_NO,
                'p_TRANSACTION_TYPE'      => $request->p_TRANSACTION_TYPE,
                'p_PO_DATE'               => $request->p_PO_DATE,
                'p_DELIVERY_DATE'         => $request->p_DELIVERY_DATE,
                'p_REMARKS'               => $request->p_REMARKS,
                'p_SUPP_CODE'             => $request->p_SUPP_CODE,
                'p_DELIVERY_OFFICE'       => $request->p_DELIVERY_OFFICE,
                'p_REF_NO'                => $request->p_REF_NO,
                'p_Office_code'           => $userdata->office_code
            ];
        $purchase1 = Http::asForm()->post("http://localhost/iFLOW/iflow_api/dpd_PO_MST_INSERT.php", $purchase);
        return redirect()->Route("purchaseorder.edit",$purchase['p_PO_NO'])->with('message','Data Added Successfully');
    }

    public function show(){
        // $purchase = PO_MST::all();
        $userdata = USER_MST::where('user_id', '=' , Session::get('loginId'))->first();
        $purchase = Http::get("http://localhost/iFLOW/iflow_api/dpd_PO_MST_SELECT.php")->collect();
        return view("backend.pages.purchaseorder.show", compact('purchase','userdata'));
    }

    public function edit($id){
        $purchase = PO_MST::where('po_no', $id)->first();
        $purchase1 = SUPPLIER_MST::all();
        $purchase2 = DB::select('SELECT * FROM IF_OFFICE_INFO ORDER BY OFFICE_CODE ASC');
        $purchase3 = $purchase->po_id;
        $purchase4 = PO_DTL::where('po_id', $purchase3)->get();
        $purchase5 = ITEM_MST::all();
        $purchase6 = DB::select(' SELECT * FROM IF_MSR_UNIT_MST');
        
        $purchase7 = DB::select('SELECT PO_ID,ITEM_CODE,(SELECT IF_ITEM_MST.ITEM_NAME FROM IF_ITEM_MST WHERE IF_PO_DTL.ITEM_CODE=IF_ITEM_MST.ITEM_CODE ) AS ITEM_NAME, QNTY, RATE, AMOUNT, REMARKS, UNIT_CODE, (SELECT IF_MSR_UNIT_MST.MSR_NAME FROM IF_MSR_UNIT_MST WHERE IF_PO_DTL.UNIT_CODE=IF_MSR_UNIT_MST.MSR_CODE ) AS UNIT_NAME, PO_NO, PO_DTL_ID FROM IF_PO_DTL WHERE PO_ID = ?', [$purchase3]);

        $purchase8 = DB::select('SELECT SUM(AMOUNT) AS AMOUNT FROM IF_PO_DTL WHERE PO_ID = ?', [$purchase3]);

        $userdata = USER_MST::where('user_id', '=' , Session::get('loginId'))->first();

        return view("backend.pages.purchaseorder.edit", compact('purchase','purchase1','purchase2','purchase4','purchase5','purchase6','purchase7','purchase8','userdata'));
    }

    public function update(Request $request, $id){
        $purchase = [
            'po_no'                       => $request->po_no,
            'transaction_type'            => $request->transaction_type,
            'po_date'                     => $request->po_date,
            'delivery_date'               => $request->delivery_date,
            'remarks'                     => $request->remarks,
            'supp_code'                   => $request->supp_code,
            'office_code'                 => $request->office_code,
            'ref_no'                      => $request->ref_no
        ];
        PO_MST::where('po_id', $id)->update($purchase);
        return redirect()->route("purchaseorder.show")->with('message','Data Updated Successfully');
    }

    public function storedtl(Request $request, $id){
        $purchase = PO_MST::where('po_id', $id)->first();
       
        // $primaryKey = PO_DTL::select(DB::raw('COALESCE(max(PO_DTL_ID),0)+1 as id'))->first();
        $purchasedtl = [
                // 'PO_DTL_ID'                => (int)($primaryKey->id),
                'p_PO_ID'                  => $purchase->po_id,
                'p_ITEM_CODE'              => $request->p_ITEM_CODE,
                'p_QNTY'                   => $request->p_QNTY,
                'p_RATE'                   => $request->p_RATE,
                'p_AMOUNT'                 => $request->p_AMOUNT,
                'p_REMARKS'                => $request->p_REMARKS,
                'p_UNIT_CODE'              => $request->p_UNIT_CODE,
                'p_PO_NO'                  => $purchase->po_no,
                'p_Office_code'            => $request->p_Office_code,
                'p_USER'                   => $request->p_USER
            ];
        $purchasedtl1 = Http::asForm()->post("http://localhost/iFLOW/iflow_api/dpd_PO_dtl_INSERT.php", $purchasedtl,$purchase);
        // return redirect("purchaseorder/edit/" . $purchase->po_id. '#' . $updatedElementId)->with('message','Data Added Successfully');
        return redirect()->back()->with('message','Data Added Successfully')->withFragment('updated-row');
    }

    public function updatedtl(Request $request, $id){
        $purchase = [
            'item_code'           => $request->item_code,
            'qnty'                => $request->qnty,
            'unit_code'           => $request->unit_code,
            'rate'                => $request->rate,
            'amount'              => $request->amount,
            'remarks'             => $request->remarks
        ];
        PO_DTL::where('po_dtl_id', $id)->update($purchase);
        // $purchase1 = PO_DTL::where('po_dtl_id', $id)->first();
        // $purchase2 = $purchase1->po_id;
        // $updatedElementId = 'updated-row';
        // return redirect("purchaseorder/edit/" . $purchase2 . '#' . $updatedElementId)->with('message','Data Updated Successfully');
        return redirect()->back()->with('message','Data Updated Successfully')->withFragment('updated-row');
    }

    public function deletedtl($id){
        PO_DTL::where('po_dtl_id', $id)->delete();
        // delete data dynamic
        return redirect()->back()->with('error','Data Deleted')->withFragment('updated-row');
    }
}
