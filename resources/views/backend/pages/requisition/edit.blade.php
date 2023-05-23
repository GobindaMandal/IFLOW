@extends('backend.mastering.master')
@section('content')
<!-- ########## START: MAIN PANEL ########## -->
<div class="br-mainpanel">
    <div class="pt-4 pl-4">
      <div class="row">
        <div class="col-md-6 col-lg-6 col-xl-6 col-sm-12">
          <h4 class="text-center p-1" style="color:White;background-color:#1D6E6C;font-family:Century Gothic;font-size:X-Large;font-weight:bold;height:36px;width:300px;">IT Inventory System</h4>
        </div>
        <div class="col-md-6 col-lg-6 col-xl-6 col-sm-12">
          <button onclick="window.print()" style="float:right" class="btn btn-info"><i class="fa fa-print"></i></button>
        </div>
      </div>
    </div>


    <form action="{{ Route('requisition.update',$requisition->req_no) }}" method="POST">
      @csrf
      <div class="card bd-0 shadow-base pd-25 pd-xs-40 mg-t-20">
        <div class="card-header bg-transparent pd-0 bd-b-0">
          <h5 class="text-primary tx-18 tx-spacing-1 tx-bold tx-inverse">Requsition Item</h5>
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
                  <label for="req_no">System Requisition No :</label>
                  <input readonly value="{{ $requisition->req_no }}" type="number" name="req_no" id="req_no" class="form-control tx-14 printpurchase" placeholder="Enter Requisition No">
                </div><!-- form-group -->
              </div><!-- col-2 -->

              <div class="col-md-4 col-lg-4 mg-t-10 mg-lg-t-0">
                <div class="form-group mg-b-0">
                  <label for="req_date">Requisition Date :</label>
                  <input value="{{ date('Y-m-d', strtotime($requisition->req_date))}}" type="date" name="req_date" id="req_date" class="form-control form-control-datepicker tx-14 printpurchase" data-language="en" placeholder="REQ Date">
                </div><!-- form-group -->
              </div><!-- col-2 -->

              <div class="col-md-4 col-lg-4 mg-t-10 mg-lg-t-0">
                <div class="form-group mg-b-0">
                  <label for="ref_no">Reference No :</label>
                  <input readonly value="{{ $requisition->ref_no }}" type="number" name="ref_no" id="ref_no" class="form-control tx-14 printpurchase" placeholder="Enter Reference No">
                </div><!-- form-group -->
              </div><!-- col-2 -->

              <div class="col-md-4 col-lg-4">
                <div class="form-group mg-b-0">
                  <label class="d-block">Office :</label>
                  <select id="office_code" name="office_code" class="form-control wd-100p printpurchase" data-placeholder="Choose origin">
                    <option value="">---Select Office---</option>
                    @foreach($requisition1 as $office_info)
                    <option value="{{$office_info->office_code}}" {{$office_info->office_code == $requisition->office_code  ? 'selected' : ''}}>{{$office_info->office_desc}}</option>
                    @endforeach
                  </select>
                </div><!-- form-group -->
              </div><!-- col-3 -->

              <div class="col-md-4 col-lg-4">
                <div class="form-group mg-b-0">
                  <label class="d-block">Person :</label>
                  <select id="emp_code" name="emp_code" class="form-control wd-100p printpurchase" data-placeholder="Choose origin">
                    <option value="">---Select Person---</option>
                    @foreach($requisition3 as $person)
                    <option value="{{$person->emp_code}}" {{$person->emp_code == $requisition->emp_code  ? 'selected' : ''}}>{{$person->name}}</option>
                    @endforeach
                  </select>
                </div><!-- form-group -->
              </div><!-- col-3 -->

              <div class="col-md-4 col-lg-4 mg-t-10 mg-lg-t-0">
                <div class="form-group mg-b-0">
                  <label for="remarks">Remarks :</label>
                  <input style="height: 38px;" value="{{ $requisition->remarks }}" type="text" name="remarks" id="remarks" class="form-control tx-14 printpurchase" placeholder="Enter Remarks">
                </div><!-- form-group -->
              </div><!-- col-2 -->

              <div class="col-md-4 col-lg-4 mg-t-10 mg-lg-t-0">
                <div class="form-group mg-b-0">
                  <label for="rec_no">Receive No :</label>
                  <input value="{{ $requisition->rec_no }}" type="text" name="rec_no" id="rec_no" class="form-control tx-14 printpurchase" placeholder="Enter Receive No">
                </div><!-- form-group -->
              </div><!-- col-2 -->

              <div class="col-md-4 col-lg-4 mg-t-10 mg-lg-t-0">
                <div class="form-group mg-b-0">
                  <label for="rec_date">Receive Date :</label>
                  <input value="{{ date('Y-m-d', strtotime($requisition->rec_date))}}" type="date" name="rec_date" id="rec_date" class="form-control form-control-datepicker tx-14 printpurchase" data-language="en" placeholder="Receive Date">
                </div><!-- form-group -->
              </div><!-- col-2 -->


            </div><!-- row -->

            <button class="btn btn-info tx-11 tx-spacing-1 tx-semibold pd-y-12 pd-x-30 mg-t-10">Update</button>
        </div><!-- card-block -->
      </div>

      <!-- card -->

    </form>

    <div class="card bd-0 shadow-base mt-3">
      <div class="card-header bg-transparent pd-0 bd-b-0">
        <div class="card-block pd-0">

          <table class="table table-bordered table-sm table-striped">
            <thead class="thead-dark">
              <tr>
                <th></th>
                <th>Item name</th>
                <th>Unit</th>
                <th>Quantity</th>
                <th>Remarks</th>
                <th class="abcd">Action</th>

              </tr>
            </thead>

            <tbody id="updated-row">
              <tr class="insertdtl">
                <form action="{{ Route('requisition.storedtl',$requisition->req_no) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <td colspan="2">
                    <select style="height: 43px;" class="form-control mb-3" name="p_ITEM_CODE" id="p_ITEM_CODE" aria-label=".form-select-lg example">
                      <option value="">---Item Name---</option>
                      @foreach($requisition2 as $items)
                      <option value="{{$items->item_code}}">{{$items->item_name}}</option>
                      @endforeach
                    </select>
                  </td>
                  <td>
                    <select style="height: 43px;" class="form-control mb-3" name="p_UNIT_CODE" id="p_UNIT_CODE" aria-label=".form-select-lg example">
                      <option value="">---Unit---</option>
                      @foreach($requisition4 as $unit)
                      <option value="{{ $unit->msr_code}}">{{ $unit->msr_name }}</option>
                      @endforeach
                    </select>
                  </td>
                  <td><input type="text" name="p_QNTY" id="p_QNTY" class="form-control" value="" ></td>
                  <td><input type="text" name="p_REMARKS" id="p_REMARKS" class="form-control" value="" ></td>
                  
                  <td><button class="btn btn-info tx-11 tx-spacing-1 tx-uppercase tx-semibold tx-mont pd-y-12 pd-x-15"><i class="fas fa-plus"></i></td>

                </form>
              </tr>

              <tr>
              @foreach($requisition6 as $requisition)
             
              <tr>
                <td></td>
                <td>{{ $requisition->item_name }}</td>
                <td>{{ $requisition->unit_name }}</td>
                <td>{{ $requisition->qnty }}</td>
                <td>{{ $requisition->remarks }}</td>

                <td class="defg">
                  <div class="d-flex">
                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editfromModal{{ $requisition->req_dtl_id }}"><i class="fa fa-edit"></i></button>

                    <button type="button" class="btn btn-danger btn-sm ml-2" data-toggle="modal" data-target="#deletefromModal{{ $requisition->req_dtl_id }}"><i class="fa fa-trash"></i></button>
                  </div>
                </td>

              </tr>

<!-- Delete Modal -->
<div class="modal fade" id="deletefromModal{{ $requisition->req_dtl_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmation Message</h5>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this item?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="{{ Route('requisition.deletedtl',$requisition->req_dtl_id) }}" type="button" class="btn btn-danger">Delete</a>
      </div>
    </div>
  </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editfromModal{{ $requisition->req_dtl_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Item</h5>
      </div>
      <div class="modal-body">
        <form action="{{ Route('requisition.updatedtl',$requisition->req_dtl_id) }}" method="POST">
          @csrf
          <span>Item Name :</span>
          <select class="form-control mb-3" name="item_code" id="item_code" aria-label=".form-select-lg example">
            <option value="">---Item Name---</option>
            @foreach($requisition2 as $items)
            <option value="{{$items->item_code}}" {{$items->item_code == $requisition->item_code  ? 'selected' : ''}}>{{$items->item_name}}</option>
            @endforeach
          </select>

          <span>Unit Name :</span>
          <select class="form-control mb-3" name="unit_code" id="unit_code" aria-label=".form-select-lg example">
            <option value="">---Unit---</option>
            @foreach($requisition4 as $unit)
            <option value="{{ $unit->msr_code }}" {{$unit->msr_code == $requisition->unit_code  ? 'selected' : ''}}>{{ $unit->msr_name }}</option>
            @endforeach
          </select>
          
          <span>Quantity :</span>
          <input value="{{ $requisition->qnty }}" type="text" name="qnty" id="qnty" class="mb-3 form-control">
          
          <span>Remarks :</span>
          <input value="{{ $requisition->remarks }}" type="text" name="remarks" id="remarks" class="mb-3 form-control">

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button class="btn btn-info">Update</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>

            @endforeach
            
            </tr>


            <!-- <tr>

              <td colspan="5" class="text-center"> Total:</td>
              <td class="table-secondary ms-2">3100000</td>
            </tr> -->


          </tbody>
        </table>

      </div>
    </div>
  </div>
</div>

<style>
  @media print{
    .btn{
      display:none;
    }
    .icon{
      display:none;
    }
    .insertdtl{
      display:none;
    }
    .abcd{
      display:none;
    }
    .defg{
      display:none;
    }
    .dropdown{
      display:none;
    }
    .br-header-left .input-group {
      border-right:none;
    }
    .printpurchase {
      border-top-style: hidden;
      border-right-style: hidden;
      border-left-style: hidden;
      border-bottom-style: hidden;
      /* background-color: #eee; */
    }
    select::-ms-expand {
      display: none; /* for Internet Explorer */
    }
    select {
      -webkit-appearance: none; /* for Safari and Chrome */
      -moz-appearance: none; /* for Firefox */
      appearance: none; /* for other browsers */
    }
    input[type="date"]::-webkit-calendar-picker-indicator {
      display: none;
    }
    input[readonly] {
      background-color: transparent !important;
    }
  }
</style>

@endsection