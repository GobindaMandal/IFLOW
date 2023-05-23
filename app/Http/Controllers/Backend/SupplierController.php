<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use App\Models\Backend\SUPPLIER_MST;
use App\Models\Backend\MAJOR_CATEGORY;
use App\Models\Backend\MAJOR_SUB_CATEGORY;
use App\Models\Backend\MINOR_SUB_CATEGORY;
use App\Models\Backend\ITEM_MST;
use App\Models\Backend\SUPP_PRODUCT_DTL;

class SupplierController extends Controller
{
    public function add(){
        $supplier = Http::get("http://localhost/iFLOW/iflow_api/dpd_SUPP_MST_SELECT.php")->collect();
        return view("backend.pages.supplier.add", compact('supplier'));
    }

    public function store(Request $request){
        $supplier = [
            'p_SUPP_CODE'               => $request->p_SUPP_CODE,
            'p_SUPP_NAME'               => $request->p_SUPP_NAME,
            'p_ADDRESS'                 => $request->p_ADDRESS,
            'p_CONT_PERSON'             => $request->p_CONT_PERSON,
            'p_MOBILE_NO'               => $request->p_MOBILE_NO,
            'p_EMAIL_ADDR'              => $request->p_EMAIL_ADDR,
            'p_Office_code'             => $request->p_Office_code,
            'p_USER'                    => $request->p_USER
        ];
        $supplier1 = Http::asForm()->post("http://localhost/iFLOW/iflow_api/dpd_SUPP_MST_INSERT.php", $supplier);
        return redirect()->route("supplier.add")->with('message','Data Added Successfully');
    }

    public function update(Request $request, $id){
        $purchase = [
            'SUPP_CODE'                 => $request->SUPP_CODE,
            'SUPP_NAME'                 => $request->SUPP_NAME,
            'ADDRESS'                   => $request->ADDRESS,
            'CONT_PERSON'               => $request->CONT_PERSON,
            'MOBILE_NO'                 => $request->MOBILE_NO,
            'EMAIL_ADDR'                => $request->EMAIL_ADDR
        ];
        SUPPLIER_MST::where('supp_id', $id)->update($purchase);
        return redirect()->back()->with('message','Data Updated Successfully')->withFragment('updated-row');
    }

    public function delete($id){
        SUPPLIER_MST::where('supp_id', $id)->delete();
        return redirect()->back()->with('error','Data Deleted')->withFragment('updated-row');
    }

    public function supplier_product($id){
        $supplier = SUPPLIER_MST::where('supp_id', $id)->first();
        $supplier1 = DB::select('SELECT * FROM IF_MAJOR_CATEGORY ORDER BY MJR_CAT_ID ASC');
        $supplier2 = $supplier->supp_code;

        $supplier3 = DB::select('SELECT SUPP_CODE, (SELECT SUPP_NAME FROM IF_SUPPLIER_MST WHERE IF_SUPPLIER_MST.SUPP_CODE = IF_SUPP_PRODUCT_DTL.SUPP_CODE) AS SUPP_NAME, ITEM_CODE,
        (SELECT ITEM_NAME FROM IF_ITEM_MST WHERE IF_ITEM_MST.ITEM_CODE = IF_SUPP_PRODUCT_DTL.ITEM_CODE) AS ITEM_NAME, LAST_PUR_DATE, LAST_PUR_RATE,SUPP_PROD_ID FROM IF_SUPP_PRODUCT_DTL  WHERE SUPP_CODE = ?',[$supplier2]);
        // $supplier2 = Http::get("http://localhost/iFLOW/iflow_api/dpd_SUPP_PRODUCT_DTL_SELECT.php")->collect();
        return view("backend.pages.supplier.supplier_product", compact('supplier','supplier1','supplier3'));
    }

    public function majorsub($id){
        $majorsub = MAJOR_SUB_CATEGORY::where('mjr_cat_code',$id)->get();
        // return response()->json($majorsub);
        return response()->json([
            'majorsub' => $majorsub
        ]);
    }

    public function minorsub($id){
        $minorsub = MAJOR_SUB_CATEGORY::where('mjr_sub_cat_id',$id)->first();
        $minorsub1 = $minorsub->mjr_cat_code;
        $minorsub2 = $minorsub->mjr_sub_cat_code;
        $minorsub3 = MINOR_SUB_CATEGORY::where('mjr_cat_code', $minorsub1)->where('mjr_sub_cat_code', $minorsub2)->get();
        return response()->json([
            'minorsub' => $minorsub3
        ]);
    }

    public function item($id){
        $item = MINOR_SUB_CATEGORY::where('mnr_sub_cat_id', $id)->first();
        $item1 = $item->mjr_cat_code;
        $item2 = $item->mjr_sub_cat_code;
        $item3 = $item->mnr_sub_cat_code;
        $item4 = ITEM_MST::where('mjr_cat_code', $item1)->where('mjr_sub_cat_code',$item2)->where('mnr_sub_cat_code',$item3)->get();
        return response()->json([
            'item' => $item4
        ]);
    }

    public function itemCN($id){
        $item = ITEM_MST::where('item_id',$id)->first();
        return response()->json([
            'item' => $item
        ]);
    }

    public function storedtl(Request $request){
        $supplierdtl = [
            'p_SUPP_CODE'               => $request->p_SUPP_CODE,
            'p_ITEM_CODE'               => $request->item_code,
            'p_Last_pur_date'           => $request->p_Last_pur_date,
            'p_LAST_PUR_RATE'           => $request->p_LAST_PUR_RATE,
            'p_Office_code'             => $request->p_Office_code,
            'p_USER'                    => $request->p_USER
        ];
        $supplierdtl1 = Http::asForm()->post("http://localhost/iFLOW/iflow_api/dpd_SUPP_PRODUCT_DTL_INSERT.php", $supplierdtl);
        return redirect()->back()->with('message','Data Added Successfully');
    }

    public function updatedtl(Request $request, $id){
        $supplierdtl = [
            'last_pur_date'             => $request->last_pur_date,
            'last_pur_rate'             => $request->last_pur_rate
        ];
        SUPP_PRODUCT_DTL::where('SUPP_PROD_ID', $id)->update($supplierdtl);
        return redirect()->back()->with('message','Data Updated Successfully')->withFragment('updated-row');
    }

    public function deletedtl($id){
        SUPP_PRODUCT_DTL::where('SUPP_PROD_ID', $id)->delete();
        return redirect()->back()->with('error','Data Deleted')->withFragment('updated-row');
    }
}
