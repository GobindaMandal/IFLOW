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
          <button onclick="window.print()" style="float:right" class="report btn btn-info"><i class="fa fa-print"></i></button>
        </div>
      </div>
    </div>


  <form action="{{ Route('purchaseorder.update',$purchase->po_id) }}" method="POST">
    @csrf
      <div class="card bd-0 shadow-base pd-5 pd-xs-40 mg-t-20">
        <div class="card-header bg-transparent pd-0 bd-b-0">
          <h5 class="report text-primary tx-18 tx-spacing-1 tx-bold tx-inverse">Purchase Order</h5>
          <!-- <p class="tx-14 mg-b-20 mg-xs-b-30">Earn miles when you book a flight to any destination.</p> -->
        </div><!-- card-header -->
        <div class="container card-block pd-0">


          <div class="row row-sm mg-t-20 " >
            <div class="col-md-4 col-lg-4 mg-t-10 mg-lg-t-0">
              <div class="form-group mg-b-0">
                <label for="po_no">System Purchase No :</label>
                <input readonly value="{{$purchase->po_no}}" type="text" name="po_no" id="po_no" class="form-control tx-14 printpurchase" placeholder="Enter System Purchase No">
              </div><!-- form-group -->
            </div><!-- col-2 -->

            <div class="col-md-4 col-lg-4 mg-t-10 mg-lg-t-0">
              <div class="form-group mg-b-0">
                <label for="transaction_type">Transaction Type :</label>
                <input value="{{$purchase->transaction_type}}" type="text" name="transaction_type" id="transaction_type" class="form-control tx-14 printpurchase" placeholder="Enter Transaction Type">
              </div><!-- form-group -->
            </div><!-- col-2 -->

            <div class="col-md-4 col-lg-4 mg-t-10 mg-lg-t-0">
              <div class="form-group mg-b-0">
                <label for="po_date">Purchase Date :</label>
                <input value="{{date('Y-m-d', strtotime($purchase->po_date))}}" type="date" name="po_date" id="po_date" class="form-control tx-14 printpurchase" placeholder="Purchase Date">
              </div><!-- form-group -->
            </div><!-- col-2 -->

            <div class="col-md-4 col-lg-4 mg-t-10 mg-lg-t-0">
              <div class="form-group mg-b-0">
                <label class="d-block">Supplier :</label>
                <select id="supp_code" name="supp_code" class="form-control wd-100p printpurchase" data-placeholder="Choose origin">
                  <option value="">---Select Supplier---</option>
                  @foreach($purchase1 as $supplier)
                  <option value="{{$supplier->supp_code}}" {{$supplier->supp_code == $purchase->supp_code  ? 'selected' : ''}}>{{$supplier->supp_name}}</option>
                  @endforeach
                </select>
              </div><!-- form-group -->
            </div><!-- col-3 -->

            <div class="col-md-4 col-lg-4 mg-t-10 mg-lg-t-0">
              <div class="form-group mg-b-0">
                <label for="delivery_date">Delivery Date :</label>
                <input value="{{ date('Y-m-d', strtotime($purchase->delivery_date))}}" type="date" name="delivery_date" id="delivery_date" class="form-control tx-14 printpurchase" placeholder="Date or origin">
              </div><!-- form-group -->
            </div><!-- col-2 -->

            <div class="col-md-4 col-lg-4 mg-t-10 mg-md-t-0">
              <div class="form-group mg-b-0">
                <label class="d-block">Delivery Ofiice :</label>
                <div>
                  <select id="office_code" name="office_code" class="form-control wd-100p printpurchase" data-placeholder="Choose destination">
                    <option value="">---Select Delivery Ofiice---</option>
                    @foreach($purchase2 as $delivery)
                    <option value="{{$delivery->office_code}}" {{$delivery->office_code == $purchase->office_code  ? 'selected' : ''}}>{{$delivery->office_desc}}</option>
                    @endforeach
                  </select>
                </div>
              </div><!-- form-group -->
            </div><!-- col-3 -->

            <div class="col-md-4 col-lg-4 mg-t-10 mg-lg-t-0">
              <div class="form-group mg-b-0">
                <label for="remarks">Reference Po No :</label>
                <input value="{{ $purchase->ref_no }}" type="text" name="ref_no" id="ref_no" class="form-control tx-14 printpurchase" placeholder="Enter Reference Po No">
              </div><!-- form-group -->
            </div><!-- col-2 -->

            <div class="col-md-4 col-lg-4 mg-t-10 mg-lg-t-0">
              <div class="form-group mg-b-0">
                <label for="remarks">Remarks :</label>
                <input value="{{ $purchase->remarks }}" type="text" name="remarks" id="remarks" class="form-control tx-14 printpurchase" placeholder="Enter Remarks">
              </div><!-- form-group -->
            </div><!-- col-2 -->


          </div><!-- row -->

          <button class="report btn btn-info tx-11 tx-spacing-1 tx-semibold pd-y-12 pd-x-30 mg-t-10">Update</button>
        </div><!-- card-block -->
      </div><!-- card -->
  </form>

  <div class="card bd-0 shadow-base mt-3">
    <div class="card-header bg-transparent pd-0 bd-b-0">
      <div class="card-block pd-0">

        <table  class="table table-bordered table-sm table-striped">
          <thead class="thead-dark">
            <tr>
              <th></th>
              <th>Item name</th>
              <th>Quantity</th>
              <th>Unit</th>
              <th>Rate</th>
              <th>Amount</th>
              <th>Remarks</th>
              <th class="report">Action</th>
            
            </tr>
          </thead>

          <tbody id="updated-row">
            <tr class="report">
              <form action="{{ Route('purchaseorder.storedtl',$purchase->po_id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <td colspan="2">
                  <select class="form-control mb-3" name="p_ITEM_CODE" id="p_ITEM_CODE" aria-label=".form-select-lg example">
                  <option value="">---Item Name---</option>
                  @foreach($purchase5 as $items)
                  <option value="{{$items->item_code}}">{{$items->item_name}}</option>
                  @endforeach
                  </select>
                </td>
                <td><input type="number" name="p_QNTY" id="p_QNTY" class="form-control"></td>
                <td>
                  <select style="width: 80px;" class="form-control mb-3" name="p_UNIT_CODE" id="p_UNIT_CODE" aria-label=".form-select-lg example">
                  <option value="" >---Unit---</option>
                  @foreach($purchase6 as $unit)
                  <option value="{{$unit->msr_code}}" >{{$unit->msr_name}}</option>
                  @endforeach
                  </select>
                </td>
                
                <td><input type="text" name="p_RATE" id="p_RATE" class="form-control" value="" oninput="calc();"></td>
                <td><input readonly type="text" name="p_AMOUNT" id="p_AMOUNT" class="form-control text-right" value="" oninput="calc();"></td>
                <td><input type="text" name="p_REMARKS" id="p_REMARKS" class="form-control"></td>

                <td><button class="report btn btn-info tx-11 tx-spacing-1 tx-uppercase tx-semibold tx-mont pd-y-12 pd-x-15"><i class="fas fa-plus"></i></td>

              </form>
            </tr>
            
            

            <tr>
            @foreach($purchase7 as $purchase)
            <tr>

              <td></td>
              <td>{{ $purchase->item_name }}</td>
              <td>{{ $purchase->qnty }}</td>
              <td>{{ $purchase->unit_name }}</td>
              <td>{{ $purchase->rate }}</td>
              <td class="text-right">{{ $purchase->amount }}</td>
              <td>{{ $purchase->remarks }}</td>

              <td class="report">
              <div class="d-flex">
                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editfromModal{{$purchase->po_dtl_id}}"><i class="fa fa-edit"></i></button>

                <button type="button" class="btn btn-danger btn-sm ml-2" data-toggle="modal" data-target="#deletefromModal{{$purchase->po_dtl_id}}"><i class="fa fa-trash"></i></button>
              </div>
              </td>
  
            </tr>

<!-- Delete Modal -->
<div class="modal fade" id="deletefromModal{{$purchase->po_dtl_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <a href="{{ Route('purchaseorder.deletedtl', $purchase->po_dtl_id) }}" type="button" class="btn btn-danger">Delete</a>
      </div>
    </div>
  </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editfromModal{{$purchase->po_dtl_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Item</h5>
      </div>
      <div class="modal-body">

        <form  action="{{ Route('purchaseorder.updatedtl',$purchase->po_dtl_id) }}" method="POST">
          @csrf
          <span>Item Name :</span>
          <select class="form-control mb-3" name="item_code" id="item_code"  aria-label=".form-select-lg example">
            @foreach($purchase5 as $items)
            <option value="{{$items->item_code}}" {{$items->item_code == $purchase->item_code  ? 'selected' : ''}}>{{$items->item_name}}</option>
            @endforeach
          </select>
          
          <span>Quantity :</span>
          <input value="{{$purchase->qnty}}" type="number" name="qnty" id="qnty{{$purchase->po_dtl_id}}" class="mb-3 form-control" placeholder="Quantity">
          
          <span>Unit :</span>
          <select class="form-control mb-3" name="unit_code" id="unit_code"  aria-label=".form-select-lg example">
            @foreach($purchase6 as $unit)
            <option value="{{$unit->msr_code}}" {{$unit->msr_code == $purchase->unit_code  ? 'selected' : ''}}>{{$unit->msr_name}}</option>
            @endforeach
          </select>
          
          <span>Rate :</span>
          <input value="" type="text" name="rate" id="rate{{$purchase->po_dtl_id}}" placeholder="Rate" class="mb-3 form-control" oninput="calc3({{$purchase->po_dtl_id}});">
          
          <span>Amount :</span>
          <input readonly value="" type="text" name="amount" id="amount{{$purchase->po_dtl_id}}" placeholder="Amount" class="mb-3 form-control" oninput="calc3({{$purchase->po_dtl_id}});">
          
          <span>Remarks :</span>
          <input value="{{$purchase->remarks}}" type="text" name="remarks" id="remarks" placeholder="Remarks" class="mb-3 form-control">
          
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
            
            <tr>
              @foreach($purchase8 as $purchase_amt)
              <td colspan="5" class="text-center"> Total:</td>
              <td class="table-secondary ms-2 text-right">{{ $purchase_amt->amount }}</td>
              @endforeach
            </tr>


          </tbody>
        </table>

      </div>
    </div>

  </div>
  <!-- <div class="pt-5">
    <p class="col-md-4 preparedby">Prepared by</p>
    <p class="col-md-4 checkedby">Checked by</p>
    <p class="col-md-4 authorizedby">Authorized by</p>
    <style>
      @media screen {
        .preparedby,.checkedby,.authorizedby {
        display: none;
        }
      }
    </style>
  </div> -->
</div>

<style>
  @media print{
    .report{
      display: none;
    }
    .icon{
      display: none;
    }
    .dropdown{
      display:none;
    }
    .br-header-left .input-group {
      border-right: none;
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