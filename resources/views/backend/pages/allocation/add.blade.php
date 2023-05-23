@extends('backend.mastering.master')
@section('content')
<!-- ########## START: MAIN PANEL ########## -->
<div class="br-mainpanel">
    <div class="pt-4 pl-4">
      <div class="row">
        <div class="col-md-6 col-lg-6 col-xl-6 col-sm-12">
          <h4 class="text-center p-1" style="color:White;background-color:#1D6E6C;font-family:Century Gothic;font-size:X-Large;font-weight:bold;height:36px;width:300px;">IT Inventory System</h4>
        </div>
        <!-- <div class="col-md-6 col-lg-6 col-xl-6 col-sm-12">
          <button onclick="window.print()" style="float:right" class="btn btn-info"><i class="fa fa-print"></i></button>
        </div> -->
      </div>
    </div>


    <form action="{{ Route('allocation.store') }}" method="POST">
      @csrf
      <div class="card bd-0 shadow-base pd-25 pd-xs-40 mg-t-20">
        <div class="card-header bg-transparent pd-0 bd-b-0">
            <h5 class="text-primary tx-18 tx-spacing-1 tx-bold tx-inverse">Allocation</h5>
            <!-- <p class="tx-14 mg-b-20 mg-xs-b-30">Earn miles when you book a flight to any destination.</p> -->
        </div><!-- card-header -->
        <div class="container card-block pd-0">


          <div class="row row-sm mg-t-20">

              <div class="col-md-4 col-lg-4 mg-t-10 mg-lg-t-0">
                <div class="form-group mg-b-0">
                  <label for="p_ALLOC_NO">System Allocation No :</label>
                  <input   value="" type="number" name="p_ALLOC_NO" id="p_ALLOC_NO" class="form-control tx-14 printpurchase" placeholder="Enter System Allocation No">
                </div><!-- form-group -->
              </div><!-- col-2 -->           

              <div class="col-md-4 col-lg-4 mg-t-10 mg-lg-t-0">
                <div class="form-group mg-b-0">
                  <label for="p_REF_NO">Allocation Reference No :</label>
                  <input   value="" type="number" name="p_REF_NO" id="p_REF_NO" class="form-control tx-14 printpurchase" placeholder="Enter Allocation Reference No">
                </div><!-- form-group -->
              </div><!-- col-2 -->

              <div class="col-md-4 col-lg-4 mg-t-10 mg-lg-t-0">
                <div class="form-group mg-b-0">
                  <label for="p_ALLOC_DATE">Date :</label>
                  <input type="date" name="p_ALLOC_DATE" id="p_ALLOC_DATE" class="form-control form-control tx-14" data-language="en" placeholder="Enter Date">
                </div><!-- form-group -->
              </div><!-- col-2 -->

              <div class="col-md-4 col-lg-4 mg-t-10 mg-md-t-0">
                <div class="form-group mg-b-0">
                  <label class="d-block">Pur No :</label>
                  <div>
                    <select id="pur_no" name="pur_no" class="form-control wd-100p" data-placeholder="Choose destination">
                      <option value="">---Select Pur No---</option>
                      @foreach($alloc as $pur_no)
                      <option value="{{$pur_no->po_id}}">{{$pur_no->ref_no}}~{{$pur_no->po_date}}</option>
                      @endforeach
                    </select>
                  </div>
                </div><!-- form-group -->
              </div><!-- col-3 -->

              <div class="col-md-4 col-lg-4 mg-t-10 mg-lg-t-0">
                <div class="form-group mg-b-0">
                  <label for="p_PO_NO">System PO No :</label>
                  <input readonly value="" type="number" name="p_PO_NO" id="p_PO_NO" class="form-control tx-14 printpurchase" placeholder="Enter Pur No">
                </div><!-- form-group -->
              </div><!-- col-2 -->

              <div class="col-md-4 col-lg-4 mg-t-10 mg-lg-t-0">
                <div class="form-group mg-b-0">
                  <label for="p_REMARKS">Remarks :</label>
                  <input   value="" type="text" name="p_REMARKS" id="p_REMARKS" class="form-control tx-14 printpurchase" placeholder="Enter Remarks">
                </div><!-- form-group -->
              </div><!-- col-2 -->

          </div><!-- row -->

          <button class="btn btn-info tx-11 tx-spacing-1 tx-semibold pd-y-12 pd-x-30 mg-t-10">Save</button>
        </div><!-- card-block -->
      </div>

      <!-- card -->

    </form>


    <div class="card bd-0 shadow-base pd-25 pd-xs-40 mg-t-20">
    <div class="card-header bg-transparent pd-0 bd-b-0">
      <div class="card-block pd-0">

        <table class="table table-bordered table-sm table-striped">
          <thead class="thead-dark">
            <tr>
              <th>Allocation No</th>
              <th>Allocation Reference</th>
              <th>Date</th>
              <th>System Po No</th>
              <th>Pur No</th>
              <th>Pur Date</th>
              <th>Remarks</th>
              <th class="abcd">Action</th>

            </tr>
          </thead>

          <tbody id="updated-row">
            
            <tr>
            @foreach($alloc1 as $alloc)
            
            <tr>

              <td>{{ $alloc->alloc_no }}</td>
              <td>{{ $alloc->ref_no }}</td>
              <td>{{ $alloc->alloc_date }}</td>
              <td>{{ $alloc->po_no }}</td>
              <td>{{ $alloc->po_ref_no }}</td>
              <td>{{ $alloc->po_date }}</td>
              <td>{{ $alloc->remarks }}</td>
              
              <td class="defg">
                  <a href="{{ route('allocation.edit',$alloc->alloc_no) }}" class="btn btn-info btn-sm">Edit</i></a>
              </td>

            </tr>
            @endforeach
            </tr>


          </tbody>
        </table>

      </div>
    </div>
  </div>
</div>

@endsection