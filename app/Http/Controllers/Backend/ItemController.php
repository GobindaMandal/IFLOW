<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use App\Models\Backend\MAJOR_CATEGORY;
use App\Models\Backend\MAJOR_SUB_CATEGORY;
use App\Models\Backend\MINOR_SUB_CATEGORY;
use App\Models\Backend\ITEM_MST;
use App\Models\Frontend\USER_MST;
use Session;

class ItemController extends Controller
{
    public function addmajor(){
        $major = Http::get("http://localhost/iFLOW/iflow_api/dpd_MJR_ITEM_select.php")->collect();
        $userdata = USER_MST::where('user_id', '=' , Session::get('loginId'))->first();
        return view("backend.pages.item.addmajor", compact('major','userdata'));
    }

    public function majorstore(Request $request){
        $major = [
                'p_MJR_CAT_CODE'          => $request->p_MJR_CAT_CODE,
                'p_MJR_CAT_DESC'          => $request->p_MJR_CAT_DESC
            ];
        $major1 = Http::asForm()->post("http://localhost/iFLOW/iflow_api/dpd_MJR_ITEM_INSERT.php", $major);
        return redirect()->route("major.add")->with('message','Data Added Successfully');
    }

    public function addmajorsub($id){
        $major = MAJOR_CATEGORY::where('MJR_CAT_CODE', $id)->first();
        $major1 = $major->mjr_cat_code;

        $major2 = DB::select('SELECT * FROM IF_MAJOR_SUB_CATEGORY WHERE MJR_CAT_CODE = ? ORDER BY MJR_CAT_CODE, MJR_SUB_CAT_CODE',[$major1]);

        $userdata = USER_MST::where('user_id', '=' , Session::get('loginId'))->first();
        // $major2 = Http::get("http://localhost/iFLOW/iflow_api/dpd_MJR_sub_ITEM_select.php")->collect();
        return view("backend.pages.item.addmajorsub", compact('major','major2','userdata'));
    }

    public function majorsubstore(Request $request){
        $major = [
                'p_MJR_CAT_CODE'          => $request->mjr_cat_code,
                'p_MJR_sub_CAT_CODE'      => $request->p_MJR_sub_CAT_CODE,
                'p_MJR_sub_CAT_DESC'      => $request->p_MJR_sub_CAT_DESC
            ];
        $major1 = Http::asForm()->post("http://localhost/iFLOW/iflow_api/dpd_MJR_sub_ITEM_INSERT.php", $major);
        return redirect()->route("majorsub.add",$major['p_MJR_CAT_CODE'])->with('message','Data Added Successfully');
    }

    public function addminorsub($id){
        $minor = MAJOR_SUB_CATEGORY::where('mjr_sub_cat_id', $id)->first();
        $minor1 = $minor->mjr_cat_code;
        $minor2 = $minor->mjr_sub_cat_code;
        $minor3 = MAJOR_CATEGORY::where('mjr_cat_code', $minor1)->first();

        $minor4 = DB::select('SELECT * FROM IF_MINOR_SUB_CATEGORY WHERE MJR_CAT_CODE = ? AND MJR_SUB_CAT_CODE =? ORDER BY MJR_CAT_CODE, MJR_SUB_CAT_CODE',[$minor1,$minor2]);
        
        $userdata = USER_MST::where('user_id', '=' , Session::get('loginId'))->first();
        // $minor4 = Http::get("http://localhost/iFLOW/iflow_api/dpd_MnR_sub_ITEM_select.php")->collect();
        return view("backend.pages.item.addminorsub", compact('minor','minor3','minor4','userdata'));
    }

    public function minorsubstore(Request $request){
        $minor = [
                'p_MJR_CAT_CODE'          => $request->mjr_cat_code,
                'p_MJR_sub_CAT_CODE'      => $request->mjr_sub_cat_code,
                'p_MnR_sub_CAT_CODE'      => $request->p_MnR_sub_CAT_CODE,
                'p_MNR_sub_CAT_DESC'      => $request->p_MNR_sub_CAT_DESC
            ];
        $minor1 = Http::asForm()->post("http://localhost/iFLOW/iflow_api/dpd_MnR_sub_ITEM_INSERT.php", $minor);
        return redirect()->back()->with('message','Data Added Successfully');
    }

    public function additem($id){
        $item = MINOR_SUB_CATEGORY::where('mnr_sub_cat_id',$id)->first();
        $item1 = $item->mjr_cat_code;
        $item2 = $item->mjr_sub_cat_code;
        $item3 = $item->mnr_sub_cat_code;
        $item4 = MAJOR_SUB_CATEGORY::where('mjr_cat_code', $item1)->where('mjr_sub_cat_code', $item2)->first();
        $item5 = MAJOR_CATEGORY::where('mjr_cat_code', $item1)->first();

        // $item6 = DB::select('SELECT * FROM IF_ITEM_MST WHERE MJR_CAT_CODE = ? AND MJR_SUB_CAT_CODE =? AND MNR_SUB_CAT_CODE =? ',[$item1,$item2,$item3]);
        $item6 = ITEM_MST::where('mjr_cat_code', $item1)->where('mjr_sub_cat_code', $item2)->where('mnr_sub_cat_code', $item3)->get();

        $userdata = USER_MST::where('user_id', '=' , Session::get('loginId'))->first();

        return view("backend.pages.item.additem",compact('item','item4','item5','item6','userdata'));
    }

    public function itemstore(Request $request){
        $item = [
            'p_MJR_CAT_CODE'          => $request->mjr_cat_code,
            'p_MJR_sub_CAT_CODE'      => $request->mjr_sub_cat_code,
            'p_MnR_sub_CAT_CODE'      => $request->mnr_sub_cat_code,
            'p_ITEM_CODE'             => $request->p_ITEM_CODE,
            'p_SL_NO'                 => $request->p_SL_NO,
            'p_ITEM_NAME'             => $request->p_ITEM_NAME,
            'p_DESCRIPTION'           => $request->p_DESCRIPTION,
            'p_BRAND_NAME'            => $request->p_BRAND_NAME,
            'p_MODEL_NAME'            => $request->p_MODEL_NAME,
            'p_UNIT_CODE'             => $request->p_UNIT_CODE,
            'p_DATE_ACTIVE'           => $request->p_DATE_ACTIVE,
            'p_REORDER_LEVEL'         => $request->p_REORDER_LEVEL,
            'p_REMARKS_ITEM'          => $request->p_REMARKS_ITEM,
            'p_OPN_BAL'               => $request->p_OPN_BAL,
            'p_OPN_VAL'               => $request->p_OPN_VAL
        ];
        $item1 = Http::asForm()->post("http://localhost/iFLOW/iflow_api/dpd_ITEM_INSERT.php", $item);
        return redirect()->back()->with('message','Data Added Successfully');
    }

    public function updatedtl(Request $request, $id){
        $item = [
            'item_code'           => $request->item_code,
            'sl_no'               => $request->sl_no,
            'short_code'          => $request->short_code,
            'item_name'           => $request->item_name,
            'description'         => $request->description,
            'brand_name'          => $request->brand_name,
            'model_name'          => $request->model_name,
            'unit_code'           => $request->unit_code,
            'date_active'         => $request->date_active,
            'reorder_level'       => $request->reorder_level,
            'remarks_item'        => $request->remarks_item,
            'opn_bal'             => $request->opn_bal,
            'opn_val'             => $request->opn_val
        ];
        ITEM_MST::where('item_id', $id)->update($item);
        return redirect()->back()->with('message','Data Updated Successfully')->withFragment('updated-row');
    }

    public function deletedtl($id){
        ITEM_MST::where('item_id', $id)->delete();
        return redirect()->back()->with('error','Data Deleted')->withFragment('updated-row');
    }
}
