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


  <form action="{{ Route('purchaseorder.store') }}" method="POST">
    @csrf
      <div class="card bd-0 shadow-base pd-25 pd-xs-40 mg-t-20">
        <div class="card-header bg-transparent pd-0 bd-b-0">
          <h5 class="text-primary tx-18 tx-spacing-1 tx-bold tx-inverse">Purchase Order</h5>
          <!-- <p class="tx-14 mg-b-20 mg-xs-b-30">Earn miles when you book a flight to any destination.</p> -->
        </div><!-- card-header -->
        <div class="container card-block pd-0">


          <div class="row row-sm mg-t-20">
            <div class="col-md-4 col-lg-4 mg-t-10 mg-lg-t-0">
              <div class="form-group mg-b-0">
                <label for="p_PO_NO">System Purchase No :</label>
                <input type="text" name="p_PO_NO" id="p_PO_NO" class="form-control tx-14" placeholder="Enter Purchase No">
              </div><!-- form-group -->
            </div><!-- col-2 -->

            <div class="col-md-4 col-lg-4 mg-t-10 mg-lg-t-0">
              <div class="form-group mg-b-0">
                <label for="p_TRANSACTION_TYPE">Transaction Type :</label>
                <input type="text" name="p_TRANSACTION_TYPE" id="p_TRANSACTION_TYPE" class="form-control tx-14" placeholder="Enter Transaction Type">
              </div><!-- form-group -->
            </div><!-- col-2 -->


            <div class="col-md-4 col-lg-4 mg-t-10 mg-lg-t-0">
              <div class="form-group mg-b-0">
                <label for="p_PO_DATE">Purchase Date :</label>
                <input type="date" name="p_PO_DATE" id="p_PO_DATE" class="form-control tx-14" placeholder="Purchase Date">
              </div><!-- form-group -->
            </div><!-- col-2 -->

            <div class="col-md-4 col-lg-4">
              <div class="form-group mg-b-0">
                <label class="d-block">Supplier :</label>
                <select id="p_SUPP_CODE" name="p_SUPP_CODE" class="form-control wd-100p" data-placeholder="Choose origin">
                  <option value="">---Select Supplier---</option>
                  @foreach($purchase as $supplier)
                  <option value="{{$supplier->supp_code}}">{{$supplier->supp_name}}</option>
                  @endforeach
                </select>
              </div><!-- form-group -->
            </div><!-- col-3 -->

            <div class="col-md-4 col-lg-4 mg-t-10 mg-lg-t-0">
              <div class="form-group mg-b-0">
                <label for="p_DELIVERY_DATE">Delivery Date :</label>
                <input type="date" name="p_DELIVERY_DATE" id="p_DELIVERY_DATE" class="form-control tx-14" placeholder="Date or origin">
              </div><!-- form-group -->
            </div><!-- col-2 -->



            <div class="col-md-4 col-lg-4 mg-t-10 mg-md-t-0">
              <div class="form-group mg-b-0">
                <label class="d-block">Delivery Ofiice :</label>
                <div>
                  <select id="p_DELIVERY_OFFICE" name="p_DELIVERY_OFFICE" class="form-control wd-100p" data-placeholder="Choose destination">
                    <option value="">---Select Delivery Ofiice---</option>
                    @foreach($purchase1 as $delivery_off)
                    <option value="{{$delivery_off->office_code}}">{{$delivery_off->office_desc}}</option>
                    @endforeach
                  </select>
                </div>
              </div><!-- form-group -->
            </div><!-- col-3 -->



            <div class="col-md-4 col-lg-4 mg-t-10 mg-lg-t-0">
              <div class="form-group mg-b-0">
                <label for="p_REF_NO">Reference Po No :</label>
                <input type="text" name="p_REF_NO" id="p_REF_NO" class="form-control tx-14" placeholder="Enter Reference Po No">
              </div><!-- form-group -->
            </div><!-- col-2 -->


            <div class="col-md-4 col-lg-4 mg-t-10 mg-lg-t-0">
              <div class="form-group mg-b-0">
                <label for="p_REMARKS">Remarks :</label>
                <input type="text" name="p_REMARKS" id="p_REMARKS" class="form-control tx-14" placeholder="Enter Remarks">
              </div><!-- form-group -->
            </div><!-- col-2 -->



          </div><!-- row -->

          <button class="btn btn-info tx-11 tx-spacing-1 tx-semibold pd-y-12 pd-x-30 mg-t-10">Save</button>
        </div><!-- card-block -->
      </div><!-- card -->

  </form>
  
@endsection