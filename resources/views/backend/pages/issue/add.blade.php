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


  <form action="{{ Route('issue.store') }}" method="POST">
    @csrf
      <div class="card bd-0 shadow-base pd-25 pd-xs-40 mg-t-20">
        <div class="card-header bg-transparent pd-0 bd-b-0">
          <h5 class="text-primary tx-18 tx-spacing-1 tx-bold tx-inverse">Issue Item</h5>
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
                <label for="p_issue_NO">System Issue No :</label>
                <input type="number" name="p_issue_NO" id="p_issue_NO" class="form-control tx-14" placeholder="Enter Issue No">
              </div><!-- form-group -->
            </div><!-- col-2 -->

            <div class="col-md-4 col-lg-4 mg-t-10 mg-lg-t-0">
              <div class="form-group mg-b-0">
                <label for="p_issue_DATE">Issue Date :</label>
                <input type="date" name="p_issue_DATE" id="p_issue_DATE" class="form-control tx-14" placeholder="Issue Date">
              </div><!-- form-group -->
            </div><!-- col-2 -->

            <div class="col-md-4 col-lg-4">
              <div class="form-group mg-b-0">
                <label class="d-block">Office :</label>
                <select name="p_Office_code" id="p_Office_code"  class="form-control wd-100p " data-placeholder="Choose origin">
                  <option value="">---Select Office---</option>
                  @foreach($issue as $office_info)
                  <option value="{{$office_info->office_code}}">{{$office_info->office_desc}}</option>
                  @endforeach
                </select>
              </div><!-- form-group -->
            </div><!-- col-3 -->

            <div class="col-md-4 col-lg-4">
              <div class="form-group mg-b-0">
                <label class="d-block">Allocation No :</label>
                <select id="p_alloc_no" name="p_alloc_no" class="form-control wd-100p" data-placeholder="Choose origin">
                  <option value="">---Allocation No---</option>
                 
                </select>
              </div><!-- form-group -->
            </div><!-- col-3 -->

            <div class="col-md-4 col-lg-4 mg-t-10 mg-lg-t-0">
              <div class="form-group mg-b-0">
                <label for="p_REMARKS">Remarks :</label>
                <input style="height:38px;" type="text" name="p_REMARKS" id="p_REMARKS" class="form-control tx-14" placeholder="Enter Remarks">
              </div><!-- form-group -->
            </div><!-- col-2 -->


          </div><!-- row -->

          <button class="btn btn-info tx-11 tx-spacing-1 tx-semibold pd-y-12 pd-x-30 mg-t-10">Save</button>
        </div><!-- card-block -->
      </div>
      
      <!-- card -->

  </form>
@endsection