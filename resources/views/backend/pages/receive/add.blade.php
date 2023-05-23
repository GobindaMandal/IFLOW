@extends('backend.mastering.master')
@section('content')
<!-- ########## START: MAIN PANEL ########## -->
<div class="br-mainpanel">
  <div class="pt-4 pl-4">
    <div class="row">
      <div class="col-md-6 col-lg-6 col-xl-6 col-sm-12">
        <h4 class="text-center p-1" style="color:White;background-color:#1D6E6C;font-family:Century Gothic;font-size:X-Large;font-weight:bold;height:36px;width:300px;">IT Inventory System</h4>
      </div>
    </div>
  </div>


  <form action="{{ Route('receive.store') }}" method="POST">
    @csrf
      <div class="card bd-0 shadow-base pd-25 pd-xs-40 mg-t-20">
        <div class="card-header bg-transparent pd-0 bd-b-0">
          <h5 class="text-primary tx-18 tx-spacing-1 tx-bold tx-inverse">Receive and Inspection</h5>
          <!-- <p class="tx-14 mg-b-20 mg-xs-b-30">Earn miles when you book a flight to any destination.</p> -->
        </div><!-- card-header -->
        <div class="container card-block pd-0">


          <div class="row row-sm mg-t-20">
            <!-- <div class="col-md-4 col-lg-4 mg-t-10 mg-lg-t-0">
              <div class="form-group mg-b-0">
                <label for="p_PO_NO">System RI No :</label>
                <input type="number" name="p_PO_NO" id="p_PO_NO" class="form-control tx-14" placeholder="System Pur No">
              </div>
            </div> -->

            <div class="col-md-4 col-lg-4 mg-t-10 mg-lg-t-0">
              <div class="form-group mg-b-0">
                <label for="p_RI_NO">System Receive No :</label>
                <input type="number" name="p_RI_NO" id="p_RI_NO" class="form-control tx-14" placeholder="Enter Receive No">
              </div><!-- form-group -->
            </div><!-- col-2 -->


            <div class="col-md-4 col-lg-4 mg-t-10 mg-lg-t-0">
              <div class="form-group mg-b-0">
                <label for="p_RI_DATE">RI Date :</label>
                <input type="date" name="p_RI_DATE" id="p_RI_DATE" class="form-control tx-14" placeholder="RI Date">
              </div><!-- form-group -->
            </div><!-- col-2 -->

            <div class="col-md-4 col-lg-4">
              <div class="form-group mg-b-0">
                <label class="d-block">PO No:</label>
                <select id="p_PO_NO" name="p_PO_NO" class="form-control wd-100p">
                  <option value="">---Select PO No---</option>
                  @foreach($receive as $receive)
                  <option value="{{$receive->po_no}}">{{$receive->po_no}}</option>
                  @endforeach
                </select>
              </div><!-- form-group -->
            </div><!-- col-3 -->

            <div class="col-md-4 col-lg-4 mg-t-10 mg-lg-t-0">
              <div class="form-group mg-b-0">
                <label for="p_REMARKS">Remarks :</label>
                <input type="text" name="p_REMARKS" id="p_REMARKS" class="form-control tx-14" placeholder="Enter Remarks">
              </div><!-- form-group -->
            </div><!-- col-2 -->

            <div class="col-md-4 col-lg-4 mg-t-10 mg-lg-t-0">
              <div class="form-group mg-b-0">
                <label for="p_REF_NO">Reference No :</label>
                <input type="number" name="p_REF_NO" id="p_REF_NO" class="form-control tx-14" placeholder="Enter Reference No">
              </div><!-- form-group -->
            </div><!-- col-2 -->



          </div><!-- row -->

          <button class="btn btn-info tx-11 tx-spacing-1 tx-semibold pd-y-12 pd-x-30 mg-t-10">Save</button>
        </div><!-- card-block -->
      </div>
      
      <!-- card -->

  </form>
@endsection