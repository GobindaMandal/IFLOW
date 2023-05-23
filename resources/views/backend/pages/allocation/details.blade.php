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
        <div class="pt-3 col-md-6 col-lg-6 col-xl-6 col-sm-12">
          <a href="{{ route('allocation.edit', $results->alloc_no) }}" class="btn btn-secondary btn-sm"><i class="fa fa-arrow-left"></i></a>
        </div>
      </div>
    </div>


    <form action="" method="POST">
      @csrf
      <div class="card bd-0 shadow-base pd-25 pd-xs-40 mg-t-10">
        <div class="card-header bg-transparent pd-0 bd-b-0">
            <h5 class="text-primary tx-18 tx-spacing-1 tx-bold tx-inverse">Allocation Details</h5>
            <!-- <p class="tx-14 mg-b-20 mg-xs-b-30">Earn miles when you book a flight to any destination.</p> -->
        </div><!-- card-header -->
        <div class="container card-block pd-0">


          <div class="row row-sm mg-t-20">

              <div class="col-md-4 col-lg-4 mg-t-10 mg-lg-t-0">
                <div class="form-group mg-b-0">
                  <label for="alloc_no">System Allocation No :</label>
                  <input readonly value="{{ $results->alloc_no }}" type="number" name="alloc_no" id="alloc_no" class="form-control tx-14 printpurchase">
                </div><!-- form-group -->
              </div><!-- col-2 -->           

              <div class="col-md-4 col-lg-4 mg-t-10 mg-lg-t-0">
                <div class="form-group mg-b-0">
                  <label for="alloc_date">Date :</label>
                  <input readonly value="{{ date('Y-m-d', strtotime($results->alloc_date))}}" type="date" name="alloc_date" id="alloc_date" class="form-control form-control tx-14" data-language="en">
                </div><!-- form-group -->
              </div><!-- col-2 -->

              <div class="col-md-4 col-lg-4 mg-t-10 mg-md-t-0">
                <div class="form-group mg-b-0">
                  <label class="d-block">Pur No :</label>
                  <div>
                    <select readonly="readonly" id="pur_no" name="pur_no" class="form-control wd-100p" data-placeholder="Choose destination">
                      @foreach($alloc1 as $pur_no)
                      <option value="{{$pur_no->po_no}}" {{$pur_no->po_no == $alloc->po_no  ? 'selected' : ''}}>{{$pur_no->ref_no}}~{{$pur_no->po_date}}</option>
                      @endforeach
                    </select>
                  </div>
                </div><!-- form-group -->
              </div><!-- col-3 -->

              <div class="col-md-4 col-lg-4 mg-t-10 mg-lg-t-0">
                <div class="form-group mg-b-0">
                  <label for="remarks">Remarks :</label>
                  <input readonly value="{{ $results->remarks }}" type="text" name="remarks" id="remarks" class="form-control tx-14 printpurchase">
                </div><!-- form-group -->
              </div><!-- col-2 -->

              <div class="col-md-4 col-lg-4 mg-t-10 mg-lg-t-0">
                <div class="form-group mg-b-0">
                  <label for="item_code">Item Code :</label>
                  <input readonly value="{{ $results->item_code }}" type="number" name="item_code" id="item_code" class="form-control tx-14 printpurchase">
                </div><!-- form-group -->
              </div><!-- col-2 -->

              <div class="col-md-4 col-lg-4 mg-t-10 mg-lg-t-0">
                <div class="form-group mg-b-0">
                  <label for="item_name">Item Name :</label>
                  <input readonly value="{{ $results->item_name }}" type="text" name="item_name" id="item_name" class="form-control tx-14 printpurchase">
                </div><!-- form-group -->
              </div><!-- col-2 -->

              <div class="col-md-3 col-lg-3 mg-t-10 mg-lg-t-0">
                <div class="form-group mg-b-0">
                  <label for="po_qnty">Orderd :</label>
                  <input readonly value="{{ $results->po_qnty }}" type="text" name="po_qnty" id="po_qnty" class="form-control tx-14 printpurchase">
                </div><!-- form-group -->
              </div><!-- col-2 -->

              <!-- <div class="col-md-3 col-lg-3 mg-t-10 mg-lg-t-0">
                <div class="form-group mg-b-0">
                  <label for="alloc_qnty">Allocated :</label>
                  <input readonly value="" type="text" name="alloc_qnty" id="alloc_qnty" class="form-control tx-14 printpurchase">
                </div>
              </div>

              <div class="col-md-3 col-lg-3 mg-t-10 mg-lg-t-0">
                <div class="form-group mg-b-0">
                  <label for="bal_qnty">Balance :</label>
                  <input readonly value="" type="text" name="bal_qnty" id="bal_qnty" class="form-control tx-14 printpurchase">
                </div>
              </div> -->

              <div class="col-md-3 col-lg-3 mg-t-10 mg-lg-t-0">
                <div class="form-group mg-b-0">
                  <label for="msr_name">Unit :</label>
                  <input readonly value="{{ $results->msr_name }}" type="text" name="msr_name" id="msr_name" class="form-control tx-14 printpurchase">
                </div><!-- form-group -->
              </div><!-- col-2 -->

          </div><!-- row -->

          <!-- <button class="btn btn-info tx-11 tx-spacing-1 tx-semibold pd-y-12 pd-x-30 mg-t-10">Update</button> -->
        </div><!-- card-block -->
      </div>

      <!-- card -->

    </form>

    <div class="card bd-0 shadow-base mt-3">
    <div class="card-header bg-transparent pd-0 bd-b-0">
      <div class="card-block pd-0">
        @if($alloc8==null)
        <table class="table table-bordered table-sm table-striped">
          <thead class="thead-dark">
            <tr>
              <th>Office Code</th>
              <th>Office Description</th>
              <th>Requisition No</th>
              <th></th>
              <th>Requisition Item Code</th>
              <th>Requisition Item Name</th>
              <th>Requisition Quantity</th>
              <th>Allocated Quantity</th>
              <th>Unallocated Quantity</th>
              <th>Remarks</th>
              <th class="abcd">Action</th>

            </tr>
          </thead>

          <tbody id="updated-row">
            <tr class="insertdtl">
              <form action="{{ Route('allocation.storedtl',['id' => $results->alloc_no, 'id2' => $results->item_code]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <td colspan="2">
                  <select style="height: 43px;" class="form-control mb-3" name="office_code" id="office_code" aria-label=".form-select-lg example">
                    <option value="">---Office---</option>
                    @foreach($alloc5 as $requisition)
                    <option value="{{ $requisition->office_code }}~{{ $requisition->item_code }}">{{ $requisition->office_code }}~{{ $requisition->office_desc }}</option>
                    @endforeach
                  </select>
                </td>
                <td colspan="2"><input readonly type="text" name="req_no" id="req_no" class="form-control"></td>
                <td colspan="2" style="width: 200px;"><input readonly type="text" name="item" id="item" class="form-control"></td>
                <td><input readonly type="text" name="qnty" id="qnty" class="form-control"></td>
                <td><input type="text" name="p_QUANTITY_ALLOCATED" id="p_QUANTITY_ALLOCATED" class="form-control" oninput="calc2();"></td>
                <td><input type="text" name="p_QUANTITY_UNALLOCATED" id="p_QUANTITY_UNALLOCATED" class="form-control" oninput="calc2();" readonly></td>
                <td><input type="text" name="p_REMARKS" id="p_REMARKS" class="form-control"></td>

                <td><button class="btn btn-info tx-11 tx-spacing-1 tx-uppercase tx-semibold tx-mont pd-y-12 pd-x-15"><i class="fas fa-plus"></i></td>

              </form>
            </tr>
            
            <tr>
            
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>

            </tr>

            </tr>

            <!-- <tr>

              <td colspan="5" class="text-center"> Total:</td>
              <td class="table-secondary ms-2">3100000</td>
            </tr> -->


          </tbody>
        </table>
        @else
        <table class="table table-bordered table-sm table-striped">
          <thead class="thead-dark">
            <tr>
              <th>Office Code</th>
              <th>Office Description</th>
              <th>Requisition No</th>
              <th></th>
              <th>Requisition Item Code</th>
              <th>Requisition Item Name</th>
              <th>Requisition Quantity</th>
              <th>Allocated Quantity</th>
              <th>Unallocated Quantity</th>
              <th>Remarks</th>
              <th class="abcd">Action</th>

            </tr>
          </thead>

          <tbody id="updated-row">
            <tr class="insertdtl">
              <form action="{{ Route('allocation.storedtl',['id' => $results->alloc_no, 'id2' => $results->item_code]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <td colspan="2">
                  <select style="height: 43px;" class="form-control mb-3" name="office_code" id="office_code" aria-label=".form-select-lg example">
                    <option value="">---Office---</option>
                    @foreach($alloc5 as $requisition)
                    <option value="{{ $requisition->office_code }}~{{ $requisition->item_code }}">{{ $requisition->office_code }}~{{ $requisition->office_desc }}</option>
                    @endforeach
                  </select>
                </td>
                <td colspan="2"><input readonly type="text" name="req_no" id="req_no" class="form-control"></td>
                <td colspan="2" style="width: 200px;"><input readonly type="text" name="item" id="item" class="form-control"></td>
                <td><input readonly type="text" name="qnty" id="qnty" class="form-control"></td>
                <td><input type="text" name="p_QUANTITY_ALLOCATED" id="p_QUANTITY_ALLOCATED" class="form-control" oninput="calc2();"></td>
                <td><input readonly type="text" name="p_QUANTITY_UNALLOCATED" id="p_QUANTITY_UNALLOCATED" class="form-control" oninput="calc2();"></td>
                <td><input type="text" name="p_REMARKS" id="p_REMARKS" class="form-control"></td>

                <td><button class="btn btn-info tx-11 tx-spacing-1 tx-uppercase tx-semibold tx-mont pd-y-12 pd-x-15"><i class="fas fa-plus"></i></td>

              </form>
            </tr>
            
            <tr>
            @foreach($alloc6 as $alloc)
            <tr>
              <td class="tx-14">{{ $alloc->office_code }}</td>
              <td class="tx-14">{{ $alloc->office_desc }}</td>
              <td class="tx-14" colspan="2">{{ $alloc->req_no }}</td>
              <td class="tx-14">{{ $alloc->item_code }}</td>
              <td class="tx-14">{{ $alloc->item_name }}</td>
              <td class="tx-14">{{ $alloc->req_qnty }}</td>
              <td class="tx-14">{{ $alloc->alloc_qnty }}</td>
              <td class="tx-14">{{ $alloc->unallocated_quantity }}</td>
              <td class="tx-14">{{ $alloc->remarks }}</td>
              
              <td class="defg">
                <div class="d-flex">
                  <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editfromModal{{ $alloc->alloc_dtl_id }}"><i class="fa fa-edit"></i></button>

                  <button type="button" class="btn btn-danger btn-sm ml-2" data-toggle="modal" data-target="#deletefromModal{{ $alloc->alloc_dtl_id }}"><i class="fa fa-trash"></i></button>
                </div>
              </td>

            </tr>

<!-- Delete Modal -->
<div class="modal fade" id="deletefromModal{{ $alloc->alloc_dtl_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <a href="{{ Route('allocation.deletedtl', $alloc->alloc_dtl_id) }}" type="button" class="btn btn-danger">Delete</a>
      </div>
    </div>
  </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editfromModal{{ $alloc->alloc_dtl_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Item</h5>
      </div>
      <div class="modal-body">
        <form action="{{ Route('allocation.updatedtl',$alloc->alloc_dtl_id) }}" method="POST">
          @csrf
          <span>Office :</span>
          <input readonly type="text" name="office" id="office{{$alloc->alloc_dtl_id}}" class="form-control mb-3" value="{{ $alloc->office_code }}~{{ $alloc->office_desc }}">

          <span>Requisition No :</span>
          <input readonly type="text" name="requisition_no" id="requisition_no{{$alloc->alloc_dtl_id}}" class="form-control mb-3" value="{{ $alloc->req_no }}">

          <span>Item :</span>
          <input readonly type="text" name="item_code" id="item_code{{$alloc->alloc_dtl_id}}" class="form-control mb-3" value="{{ $alloc->item_code }}~{{ $alloc->item_name }}">

          <span>Requisition Quantity :</span>
          <input readonly type="text" name="req_qnty" id="req_qnty{{$alloc->alloc_dtl_id}}" class="form-control mb-3" value="{{ $alloc->req_qnty }}">

          <span>Allocated Quantity :</span>
          <input type="text" name="alloc_qnty" id="alloc_qnty{{$alloc->alloc_dtl_id}}" class="form-control mb-3" value="{{ $alloc->alloc_qnty }}" oninput="calc5({{$alloc->alloc_dtl_id}});">

          <span>Unallocated Quantity :</span>
          <input readonly type="text" name="unallocated_quantity" id="unallocated_quantity{{$alloc->alloc_dtl_id}}" class="form-control mb-3" value="{{ $alloc->unallocated_quantity }}" oninput="calc5({{$alloc->alloc_dtl_id}});">

          <span>Remarks :</span>
          <input type="text" name="remarks" id="remarks{{$alloc->alloc_dtl_id}}" class="form-control mb-3" value="{{ $alloc->remarks }}">

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
        @endif
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
    input[readonly] {
      background-color: transparent !important;
    }
    input[type="date"] {
    border: none;
  }
  select[readonly] {
    background-color: transparent !important;
    border: none;
  }
    
  }
</style>

@endsection