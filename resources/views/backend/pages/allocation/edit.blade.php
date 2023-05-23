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
          <!-- <button onclick="window.print()" style="float:right" class="btn btn-info"><i class="fa fa-print"></i></button> -->
          <a href="{{ route('allocation.showreport', $alloc->alloc_no) }}" style="float:right" class="btn btn-info">report</a>
        </div>
      </div>
    </div>

    <form action="" method="POST">
      @csrf
      <div class="card bd-0 shadow-base pd-25 pd-xs-40 mg-t-20">
        <div class="card-header bg-transparent pd-0 bd-b-0">
            <h5 class="text-primary tx-18 tx-spacing-1 tx-bold tx-inverse">Allocated Item</h5>
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
                  <label for="alloc_no">Allocation :</label>
                  <input readonly value="{{ $alloc->alloc_no }}" type="number" name="alloc_no" id="alloc_no" class="form-control tx-14 printpurchase">
                </div><!-- form-group -->
              </div><!-- col-2 -->

              <div class="col-md-4 col-lg-4 mg-t-10 mg-lg-t-0">
                <div class="form-group mg-b-0">
                  <label for="alloc_date"> Allocation Date :</label>
                  <input readonly value="{{ $alloc->alloc_date }}" type="date" name="alloc_date" id="alloc_date" class="form-control form-control tx-14" data-language="en">
                </div><!-- form-group -->
              </div><!-- col-2 -->

              <div class="col-md-4 col-lg-4 mg-t-10 mg-md-t-0">
                <div class="form-group mg-b-0">
                  <label class="d-block">Pur No :</label>
                  <div>
                    <select readonly="readonly" id="ref_no" name="ref_no" class="form-control wd-100p" data-placeholder="Choose destination">
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
                  <input readonly value="{{ $alloc->remarks }}" type="text" name="remarks" id="remarks" class="form-control tx-14 printpurchase">
                </div><!-- form-group -->
              </div><!-- col-2 -->

            </div><!-- row -->
           
            <!-- <button class="btn btn-info tx-11 tx-spacing-1 tx-semibold pd-y-12 pd-x-30 mg-t-10">Save</button> -->
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
              <th>Item Code</th>
              <th>Item Name</th>
              <th>Unit</th>
              <th>Po Quantity</th>
              <th>Allocated Quantity</th>
              <th>Balance Quantity</th>
              <!-- <th class="abcd">Action</th> -->

            </tr>
          </thead>

          <tbody id="updated-row">
            

            <tr>
            @foreach($alloc3 as $alloc)

            <tr>

              <td><a href="{{ route('allocation.details',['id' => $alloc->alloc_no, 'id2' => $alloc->item_code]) }}">{{ $alloc->item_code }}</a></td>
              <td><a href="{{ route('allocation.details',['id' => $alloc->alloc_no, 'id2' => $alloc->item_code]) }}">{{ $alloc->item_name }}</a></td>
              <td><a href="{{ route('allocation.details',['id' => $alloc->alloc_no, 'id2' => $alloc->item_code]) }}">{{ $alloc->msr_name }}</a></td>
              <td><a href="{{ route('allocation.details',['id' => $alloc->alloc_no, 'id2' => $alloc->item_code]) }}">{{ $alloc->po_qnty }}</a></td>
              <td><a href="{{ route('allocation.details',['id' => $alloc->alloc_no, 'id2' => $alloc->item_code]) }}">{{ $alloc->alloc_qnty }}</a></td>
              <td><a href="{{ route('allocation.details',['id' => $alloc->alloc_no, 'id2' => $alloc->item_code]) }}">{{ $alloc->bal_qnty }}</a></td>
              
              <!-- <td class="defg">
                  <a href="{{ route('allocation.details',['id' => $alloc->alloc_no, 'id2' => $alloc->item_code]) }}" class="btn btn-info btn-sm" >Edit </i></a>
              </td> -->

            </tr>

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
  }
</style>

@endsection