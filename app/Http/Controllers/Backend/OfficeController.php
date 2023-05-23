<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use App\Models\Backend\OFFICE_INFO;
use App\Models\Backend\OFFICE_TYPE;
use App\Models\Backend\OFFICE_LEVEL;

class OfficeController extends Controller
{
    public function treeadd(){
        $offices = OFFICE_INFO::whereNull('parent_office_id')->with('childs')->orderBy('office_code', 'asc')->get();
        $offices2 = OFFICE_TYPE::all();
        $offices3 = OFFICE_LEVEL::all();
        return view("backend.pages.office.treeadd",compact('offices','offices2','offices3'));
    }

    public function add($id){
        $offices = OFFICE_INFO::whereNull('parent_office_id')->with('childs')->orderBy('office_code', 'asc')->get();
        $offices1 = OFFICE_INFO::where('office_id', $id)->first();
        $offices4 = $offices1->office_id;
        $offices2 = OFFICE_TYPE::all();
        $offices3 = OFFICE_LEVEL::all();
        // $offices5 = OFFICE_INFO::where('parent_office_id', $offices4)->orderBy('office_code', 'asc')->get();

        $offices5 = DB::select('SELECT PARENT_OFFICE_ID, OFFICE_ID, (SELECT OFFICE_DESC FROM IF_OFFICE_INFO WHERE OFFICE_ID = ?) AS PARENT_OFFICE_DESC_E, (SELECT OFFICE_DESC_B FROM IF_OFFICE_INFO WHERE OFFICE_ID = ?) AS PARENT_OFFICE_DESC_B,
        OFFICE_CODE, OFFICE_DESC, OFFICE_DESC_B, OFFICE_TYPE, (SELECT OFFICE_TYPE_DESC FROM IF_OFFICE_TYPE WHERE IF_OFFICE_TYPE.OFFICE_TYPE= IF_OFFICE_INFO.OFFICE_TYPE)AS OFFICE_TYPE_NAME,
        OFFICE_LEVEL_CODE, (SELECT OFFICE_LEVEL_DESC FROM IF_OFFICE_LEVEL WHERE IF_OFFICE_LEVEL.OFFICE_LEVEL_CODE=IF_OFFICE_INFO.OFFICE_LEVEL_CODE)AS OFFICE_LEVEL_NAME, ADDRESS, ADDRESS_B  from IF_OFFICE_INFO WHERE PARENT_OFFICE_ID = ?  ORDER BY OFFICE_CODE ASC', [$offices4,$offices4,$offices4]);

        return view("backend.pages.office.add",compact('offices','offices1','offices2','offices3','offices5'));
    }

    public function store(Request $request, $id){
        $office = OFFICE_INFO::where('office_id', $id)->first();
        $office1 = [
            'p_paRENT_OFFICE_ID'         => $office->office_id,
            'p_OFFICE_CODE'              => $request->p_OFFICE_CODE,
            'p_OFFICE_DESC'              => $request->p_OFFICE_DESC,
            'p_OFFICE_DESC_B'            => $request->p_OFFICE_DESC_B,
            'p_OFFICE_TYPE'              => $request->p_OFFICE_TYPE,
            'p_OFFICE_LEVEL_CODE'        => $request->p_OFFICE_LEVEL_CODE,
            'p_ADDRESS'                  => $request->p_ADDRESS,
            'p_ADDRESS_B'                => $request->p_ADDRESS_B,
            'p_DIST_CODE'                => $request->p_DIST_CODE
        ];
        $office2 = Http::asForm()->post("http://localhost/iFLOW/iflow_api/dpd_office_info_INSERT.php", $office1);
        return redirect()->back()->with('message','Data Added Successfully')->withFragment('updated-row');
    }

    public function update(Request $request, $id){
        $office = [
            'office_code'                => $request->office_code,
            'office_desc_b'              => $request->office_desc_b,
            'office_desc'                => $request->office_desc,
            'office_type'                => $request->office_type,
            'office_level_code'          => $request->office_level_code,
            'address_b'                  => $request->address_b,
            'address'                    => $request->address
        ];
        OFFICE_INFO::where('office_id', $id)->update($office);
        return redirect()->back()->with('message','Data Updated Successfully')->withFragment('updated-row');
    }

    public function delete($id){
        OFFICE_INFO::where('office_id', $id)->delete();
        // delete data dynamic
        return redirect()->back()->with('error','Data Deleted')->withFragment('updated-row');
    }
}
