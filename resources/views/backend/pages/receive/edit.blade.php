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


  <form action="{{ Route('receive.update',$receive->ri_id) }}" method="POST">
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
                <label for="ri_no">System Receive No :</label>
                <input readonly value="{{ $receive->ri_no }}" type="number" name="ri_no" id="ri_no" class="form-control tx-14 printpurchase" placeholder="Enter Receive No">
              </div><!-- form-group -->
            </div><!-- col-2 -->


            <div class="col-md-4 col-lg-4 mg-t-10 mg-lg-t-0">
              <div class="form-group mg-b-0">
                <label for="ri_date">RI Date :</label>
                <input value="{{ date('Y-m-d', strtotime($receive->ri_date)) }}" type="date" name="ri_date" id="ri_date" class="form-control tx-14 printpurchase" placeholder="RI Date">
              </div><!-- form-group -->
            </div><!-- col-2 -->

            <div class="col-md-4 col-lg-4">
              <div class="form-group mg-b-0">
                <label class="d-block">PO No :</label>
                <select id="po_no" name="po_no" class="form-control wd-100p printpurchase" data-placeholder="Choose origin">
                  <option value="">---Select PO No---</option>
                  @foreach($receive1 as $po_no)
                  <option value="{{$po_no->po_no}}" {{$po_no->po_no == $receive->po_no  ? 'selected' : ''}}>{{$po_no->po_no}}</option>
                  @endforeach
                </select>
              </div><!-- form-group -->
            </div><!-- col-3 -->

            <div class="col-md-4 col-lg-4 mg-t-10 mg-lg-t-0">
              <div class="form-group mg-b-0">
                <label for="remarks">Remarks :</label>
                <input value="{{ $receive->remarks }}" type="text" name="remarks" id="remarks" class="form-control tx-14 printpurchase" placeholder="Enter Remarks">
              </div><!-- form-group -->
            </div><!-- col-2 -->

            <div class="col-md-4 col-lg-4 mg-t-10 mg-lg-t-0">
              <div class="form-group mg-b-0">
                <label for="remarks">Reference No :</label>
                <input value="{{ $receive->ref_no }}" type="text" name="ref_no" id="ref_no" class="form-control tx-14 printpurchase" placeholder="Enter Reference No">
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
            <th>PO Quantity</th>
            <th>Rate</th>
            <th>Received Quantity</th>
            <th>Accepted Quantity</th>
            <th>Disputed Quantity</th>
            <th>Accepted Amount</th>
            <th>Remarks</th>
            <th class="abcd">Action</th>

          </tr>
        </thead>

        <tbody id="updated-row">
          <tr class="insertdtl">
            <form action="{{ Route('receive.storedtl',$receive->po_no) }}" method="POST" enctype="multipart/form-data">
              @csrf
              <td colspan="2"><select style="height: 43px;" class="form-control mb-3" name="p_ITEM_CODE" id="p_ITEM_CODE" aria-label=".form-select-lg example">
                <option value="">---Item Name---</option>
                @foreach($receive6 as $items)
                <option value="{{$items->item_code}}">{{$items->item_name}}</option>
                @endforeach
                </select></td>
              
              <td><input readonly type="text" name="p_UNIT_CODE" id="p_UNIT_CODE" class="form-control"></td>
              <td><input readonly type="text" name="p_PO_QNTY" id="p_PO_QNTY" class="form-control"></td>
              <td><input readonly type="text" name="p_rate" id="p_rate" class="form-control"></td>
              <td><input type="text" name="p_QUANTITY_RECEIVED" id="p_QUANTITY_RECEIVED" class="form-control" max="{{ $receive->po_qnty }}"></td>
              <td><input type="text" name="p_QUANTITY_ACCEPTED" id="p_QUANTITY_ACCEPTED" class="form-control" oninput="calc1();"></td>
              <td><input readonly type="text" name="p_QUANTITY_DISPUTED" id="p_QUANTITY_DISPUTED" class="form-control" oninput="calc1();"></td>
              <td><input readonly type="text" name="p_AMOUNT_ACCEPTED" id="p_AMOUNT_ACCEPTED" class="form-control" oninput="calc1();"></td>
              <td><input type="text" name="p_REMARKS" id="p_REMARKS" class="form-control"></td>

              <td><button class="btn btn-info tx-11 tx-spacing-1 tx-uppercase tx-semibold tx-mont pd-y-12 pd-x-15"><i class="fas fa-plus"></i></td>

            </form>
          </tr>

          <tr>
            @foreach($receive7 as $receive)
          <tr>
            <td></td>
            <td>{{ $receive->item_name }}</td>
            <td>{{ $receive->unit_code }}</td>
            <td>{{ $receive->po_qnty }}</td>
            <td>{{ $receive->rate }}</td>
            <td>{{ $receive->quantity_received }}</td>
            <td>{{ $receive->quantity_accepted }}</td>
            <td>{{ $receive->quantity_disputed }}</td>
            <td>{{ $receive->amount_accepted }}</td>
            <td>{{ $receive->remarks }}</td>
          

            <td class="defg">
              <div class="d-flex">
                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editfromModal{{$receive->ri_dtl_id}}"><i class="fa fa-edit"></i></button>

                <button type="button" class="btn btn-danger btn-sm ml-2" data-toggle="modal" data-target="#deletefromModal{{$receive->ri_dtl_id}}"><i class="fa fa-trash"></i></button>
              </div>
            </td>

          </tr>

<!-- Delete Modal -->
<div class="modal fade" id="deletefromModal{{$receive->ri_dtl_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <a href="{{ Route('receive.deletedtl', $receive->ri_dtl_id) }}" type="button" class="btn btn-danger">Delete</a>
      </div>
    </div>
  </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editfromModal{{$receive->ri_dtl_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Item</h5>
      </div>
      <div class="modal-body">

        <form action="{{ Route('receive.updatedtl',$receive->ri_dtl_id) }}" method="POST">
          @csrf
          <span>Item Name :</span>
          <select readonly="readonly" class="form-control mb-3" name="item_code" id="item_code" aria-label=".form-select-lg example">
            @foreach($receive6 as $items)
            <option value="{{$items->item_code}}" {{$items->item_code == $receive->item_code  ? 'selected' : ''}}>{{$items->item_name}}</option>
            @endforeach
          </select>
          
          <span>Unit :</span>
          <select readonly="readonly" class="form-control mb-3" name="unit_code" id="unit_code" aria-label=".form-select-lg example">
            @foreach($receive3 as $unit)
            <option value="{{$unit->msr_name}}" {{$unit->msr_code == $receive->unit_code  ? 'selected' : ''}}>{{$unit->msr_name}}</option>
            @endforeach
          </select>
          
          <span>PO Quantity :</span>
          <input readonly value="{{ $receive->po_qnty }}" type="text" name="po_qnty" id="po_qnty{{$receive->ri_dtl_id}}" class="mb-3 form-control">
          
          <span>Rate :</span>
          <input readonly value="{{ $receive->rate }}" type="text" name="rate" id="rate{{$receive->ri_dtl_id}}" class="mb-3 form-control">
          
          <span>Received Quantity :</span>
          <input value="{{ $receive->quantity_received }}" type="text" name="quantity_received" id="quantity_received{{$receive->ri_dtl_id}}" class="mb-3 form-control" oninput="checkQuantityReceived(this, {{$receive->po_qnty}});">
          
          <span>Accepted Quantity :</span>
          <input value="" type="text" name="quantity_accepted" id="quantity_accepted{{$receive->ri_dtl_id}}" class="mb-3 form-control" oninput="calc4({{$receive->ri_dtl_id}});">
          
          <span>Disputed Quantity :</span>
          <input readonly value="" type="text" name="quantity_disputed" id="quantity_disputed{{$receive->ri_dtl_id}}" class="mb-3 form-control" oninput="calc4({{$receive->ri_dtl_id}});">
          
          <span>Accepted Amount :</span>
          <input readonly value="" type="text" name="amount_accepted" id="amount_accepted{{$receive->ri_dtl_id}}" class="mb-3 form-control" oninput="calc4({{$receive->ri_dtl_id}});">
          
          <span>Remarks :</span>
          <input value="{{ $receive->remarks }}" type="text" name="remarks" id="remarks" class="mb-3 form-control">

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
  select[readonly] {
    background: #eee;
    /*Simular campo inativo - Sugestão @GabrielRodrigues*/
    pointer-events: none;
    touch-action: none;
  }

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