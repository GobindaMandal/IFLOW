<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use App\Models\Frontend\USER_MST;
use Session;

class ReportController extends Controller
{
    // purchaseOrder
    public function purchaseOrderDetails(){
        return view("backend.pages.report.purchase_order_details");
    }
    public function showPurchaseOrderDetails(Request $request){
        $po_no = $request->po_no;
        $from_date = $request->from_date;
        $to_date = $request->to_date;

        $report = DB::select('SELECT a.*,B.SUPP_NAME, C.ADDRESS, C.OFFICE_DESC  Office_name, C.OFFICE_DESC Delivery_office  from IF_PO_MST a, IF_SUPPLIER_MST b, IF_OFFICE_INFO c, IF_OFFICE_INFO d where po_NO = ? AND  PO_DATE BETWEEN ? AND ? and A.SUPP_CODE=B.SUPP_code and A.OFFICE_CODE=C.OFFICE_CODE and A.DELIVERY_OFFICE =D.OFFICE_CODE', [$po_no,$from_date,$to_date]);

        $report1 = DB::select('SELECT PO_ID,ITEM_CODE,(SELECT IF_ITEM_MST.ITEM_NAME FROM IF_ITEM_MST WHERE IF_PO_DTL.ITEM_CODE=IF_ITEM_MST.ITEM_CODE ) AS ITEM_NAME, QNTY, RATE, AMOUNT, REMARKS, UNIT_CODE, (SELECT IF_MSR_UNIT_MST.MSR_NAME FROM IF_MSR_UNIT_MST WHERE IF_PO_DTL.UNIT_CODE=IF_MSR_UNIT_MST.MSR_CODE ) AS UNIT_NAME, PO_NO, PO_DTL_ID FROM IF_PO_DTL WHERE PO_NO = ?', [$po_no]);

        $report2 = DB::select('SELECT SUM(AMOUNT) AS AMOUNT FROM IF_PO_DTL WHERE PO_NO = ?', [$po_no]);
        
        $userdata = USER_MST::where('user_id', '=' , Session::get('loginId'))->first();
        
        return view("backend.pages.report.show_purchase_order_details", compact('report','report1','report2','userdata'));
    }

    public function purchaseOrderSummary(){
        return view("backend.pages.report.purchase_order_summary");
    }

    public function showpurchaseOrderSummary(Request $request){
        $from_date = $request->from_date;
        $to_date = $request->to_date;

        $report = DB::select('SELECT A.PO_NO, A.PO_DATE, A.DELIVERY_DATE, A.OFFICE_CODE, (SELECT IF_OFFICE_INFO.OFFICE_DESC FROM IF_OFFICE_INFO  WHERE A.OFFICE_CODE=IF_OFFICE_INFO.OFFICE_CODE ) AS OFFICE_NAME,
        A.SUPP_CODE, (SELECT IF_SUPPLIER_MST.SUPP_NAME FROM IF_SUPPLIER_MST  WHERE A.SUPP_CODE=IF_SUPPLIER_MST.SUPP_CODE ) AS SUPP_NAME, B.RATE, B.AMOUNT, B.REMARKS FROM IF_PO_MST A, IF_PO_DTL B WHERE A.PO_NO = B.PO_NO AND  A.PO_DATE BETWEEN ? AND ?', [$from_date,$to_date]);
        
        $report1 = DB::select('SELECT SUM(B.AMOUNT) AS TOTAL_AMOUNT FROM  IF_PO_MST A,IF_PO_DTL B WHERE  A.PO_NO = B.PO_NO AND A.PO_DATE  BETWEEN ? AND ?', [$from_date,$to_date]);

        return view("backend.pages.report.show_purchase_order_summary", compact('report','report1','from_date','to_date'));
    }

    //receive 
    public function receiveDetails(){
        return view("backend.pages.report.receive_details");
    }

    public function showreceiveDetails(Request $request){
        $ri_no = $request->ri_no;
        $from_date = $request->from_date;
        $to_date = $request->to_date;

        $report = DB::select('SELECT A.RI_NO, A.RI_DATE, A.PO_NO, A.REMARKS, B.PO_DATE, B.SUPP_CODE, (SELECT IF_SUPPLIER_MST.SUPP_NAME FROM IF_SUPPLIER_MST  WHERE B.SUPP_CODE=IF_SUPPLIER_MST.SUPP_CODE ) AS SUPP_NAME, B.OFFICE_CODE,C.ADDRESS, C.OFFICE_DESC  Office_name FROM IF_RI_MST A, IF_PO_MST B , IF_OFFICE_INFO C WHERE B.OFFICE_CODE=C.OFFICE_CODE AND  A.PO_NO = B.PO_NO  AND A.RI_NO = ? AND  A.RI_DATE BETWEEN ? AND ?', [$ri_no,$from_date,$to_date]);

        $report1 = DB::select('SELECT C.RI_NO, C.RI_DATE, A.ITEM_CODE, B.ITEM_NAME, A.QUANTITY_RECEIVED, A.QUANTITY_ACCEPTED, A.UNIT_CODE, A.RATE, A.AMOUNT_ACCEPTED, A.REMARKS  FROM IF_RI_DTL A, IF_ITEM_MST B, IF_RI_MST C
        WHERE A.ITEM_CODE = B.ITEM_CODE AND C.RI_NO = ? AND  A.PO_NO = C.PO_NO  AND  C.RI_DATE BETWEEN ? AND ?', [$ri_no,$from_date,$to_date]);

        $report2 = DB::select('SELECT SUM(A.AMOUNT_ACCEPTED) AS TOTAL_AMOUNT FROM  IF_RI_DTL A, IF_RI_MST C WHERE A.PO_NO = C.PO_NO AND C.RI_NO = ? AND C.RI_DATE BETWEEN  ? AND ?', [$ri_no,$from_date,$to_date]);
        
        $userdata = USER_MST::where('user_id', '=' , Session::get('loginId'))->first();
        
        return view("backend.pages.report.show_receive_details", compact('report','report1','report2','userdata'));
    }

    public function receiveSummary(){
        return view("backend.pages.report.receive_summary");
    }

    public function showreceiveSummary(Request $request){
        $from_date = $request->from_date;
        $to_date = $request->to_date;

        $report = DB::select('SELECT A.RI_NO, A.RI_DATE, A.PO_NO, A.REMARKS, B.PO_DATE, B.SUPP_CODE,  (SELECT IF_SUPPLIER_MST.SUPP_NAME FROM IF_SUPPLIER_MST  WHERE B.SUPP_CODE=IF_SUPPLIER_MST.SUPP_CODE ) AS SUPP_NAME, C.AMOUNT_ACCEPTED FROM IF_RI_MST A, IF_PO_MST B, IF_RI_DTL C WHERE A.PO_NO = B.PO_NO AND A.PO_NO = C.PO_NO AND A.RI_DATE BETWEEN ? AND ?', [$from_date,$to_date]);

        $report1 = DB::select('SELECT SUM(C.AMOUNT_ACCEPTED) AS TOTAL_AMOUNT FROM  IF_RI_MST A, IF_PO_MST B, IF_RI_DTL C WHERE A.PO_NO = B.PO_NO AND A.PO_NO = C.PO_NO AND A.RI_DATE BETWEEN ? AND ?', [$from_date,$to_date]);

        return view("backend.pages.report.show_receive_summary", compact('report','report1','from_date','to_date'));
    }

    // requisition
    public function requisitionDetails(){
        return view("backend.pages.report.requisition_details");
    }

    public function showrequisitionDetails(Request $request){
        $req_no = $request->req_no;
        $from_date = $request->from_date;
        $to_date = $request->to_date;

        $report = DB::select('SELECT A.REQ_NO, A.REQ_DATE, A.OFFICE_CODE, A.REMARKS, B.OFFICE_DESC  FROM IF_REQ_MST A, IF_OFFICE_INFO B WHERE A.OFFICE_CODE = B.OFFICE_CODE AND A.REQ_NO = ?
        AND A.REQ_DATE BETWEEN  ? AND ?', [$req_no,$from_date,$to_date]);

        $report1 = DB::select('SELECT A.REQ_NO ,A.ITEM_CODE,B.ITEM_NAME, A.QNTY,A.UNIT_CODE, D.MSR_NAME, A.RATE,A.AMOUNT,A.REMARKS FROM IF_REQ_DTL A,IF_ITEM_MST B, IF_REQ_MST C, IF_MSR_UNIT_MST D WHERE A.ITEM_CODE = B.ITEM_CODE AND A.REQ_NO = C.REQ_NO AND A.UNIT_CODE=D.MSR_CODE AND C.REQ_NO  = ? AND C.REQ_DATE BETWEEN  ? AND ?', [$req_no,$from_date,$to_date]);

        // $report2 = DB::select('', [$req_no,$from_date,$to_date]);
        
        $userdata = USER_MST::where('user_id', '=' , Session::get('loginId'))->first();
        return view("backend.pages.report.show_requisition_details", compact('report','report1','userdata'));
    }

    public function requisitionSummary(){
        return view("backend.pages.report.requisition_summary");
    }

    public function showrequisitionSummary(Request $request){
        $from_date = $request->from_date;
        $to_date = $request->to_date;

        $report = DB::select('', [$from_date,$to_date]);

        $report1 = DB::select('', [$from_date,$to_date]);

        return view("backend.pages.report.show_requisition_summary", compact('report','report1','from_date','to_date'));
    }
}
