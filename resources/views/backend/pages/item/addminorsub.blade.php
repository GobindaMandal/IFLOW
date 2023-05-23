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
        </div>
        <div class="pt-3 col-md-6 col-lg-6 col-xl-6 col-sm-12">
          <a href="{{ route('majorsub.add', $minor3->mjr_cat_code) }}" class="btn btn-secondary btn-sm"><i class="fa fa-arrow-left"></i></a>
        </div>
      </div>
    </div>


    <form action="{{ Route('minorsub.store') }}" method="POST">
      @csrf
      <div class="card bd-0 shadow-base pd-25 pd-xs-40 mg-t-20">
        <div class="card-header bg-transparent pd-0 bd-b-0">
            <h5 class="text-primary tx-18 tx-spacing-1 tx-bold tx-inverse">Minor Sub Item</h5>
            <!-- <p class="tx-14 mg-b-20 mg-xs-b-30">Earn miles when you book a flight to any destination.</p> -->
        </div><!-- card-header -->
        <div class="container card-block pd-0">


            <div class="row row-sm mg-t-20">

              <div class="col-md-4 col-lg-4 mg-t-10 mg-lg-t-0">
                <div>
                  <label for="mjr_cat_code">Major Code :</label>
                  <input readonly  value="{{$minor3->mjr_cat_code}}" type="number" name="mjr_cat_code" id="mjr_cat_code" class="form-control tx-14 printpurchase" placeholder="Major Code">
                </div><!-- form-group -->
              </div><!-- col-2 -->

              <div class="col-md-2 col-lg-2 mg-t-10 mg-lg-t-0">
                
              </div><!-- col-2 -->

              <div class="col-md-4 col-lg-4 mg-t-10 mg-lg-t-0">
                <div>
                  <label for="mjr_cat_desc">Major Name:</label>
                  <input readonly  value="{{$minor3->mjr_cat_desc}}" type="text" name="mjr_cat_desc" id="mjr_cat_desc" class="form-control tx-14 printpurchase" placeholder="Major Name">
                </div><!-- form-group -->
              </div><!-- col-2 -->

            </div><!-- row -->

            <div class="row row-sm mg-t-20">

              <div class="col-md-4 col-lg-4 mg-t-10 mg-lg-t-0">
                <div>
                  <label for="mjr_sub_cat_code">Major Sub Code :</label>
                  <input readonly  value="{{$minor->mjr_sub_cat_code}}" type="number" name="mjr_sub_cat_code" id="mjr_sub_cat_code" class="form-control tx-14 printpurchase" placeholder="Major Sub Code">
                </div><!-- form-group -->
              </div><!-- col-2 -->

              <div class="col-md-2 col-lg-2 mg-t-10 mg-lg-t-0">
                
              </div><!-- col-2 -->

              <div class="col-md-4 col-lg-4 mg-t-10 mg-lg-t-0">
                <div>
                  <label for="mjr_sub_cat_desc">Major Sub Name :</label>
                  <input readonly value="{{$minor->mjr_sub_cat_desc}}" type="text" name="mjr_sub_cat_desc" id="mjr_sub_cat_desc" class="form-control tx-14 printpurchase" placeholder="Major Sub Name">
                </div><!-- form-group -->
              </div><!-- col-2 -->

            </div><!-- row -->

            <div class="row row-sm mg-t-20">

              <div class="col-md-4 col-lg-4 mg-t-10 mg-lg-t-0">
                <div>
                  <label for="p_MnR_sub_CAT_CODE">Minor Sub Code :</label>
                  <input type="number" name="p_MnR_sub_CAT_CODE" id="p_MnR_sub_CAT_CODE" class="form-control tx-14 printpurchase" placeholder="Enter Minor Sub Code">
                </div><!-- form-group -->
              </div><!-- col-2 -->

              <div class="col-md-2 col-lg-2 mg-t-10 mg-lg-t-0">
                
              </div><!-- col-2 -->

              <div class="col-md-4 col-lg-4 mg-t-10 mg-lg-t-0">
                <div>
                  <label for="p_MNR_sub_CAT_DESC">Minor Sub Name :</label>
                  <input type="text" name="p_MNR_sub_CAT_DESC" id="p_MNR_sub_CAT_DESC" class="form-control tx-14 printpurchase" placeholder="Enter Minor Sub Name">
                </div><!-- form-group -->
              </div><!-- col-2 -->

            </div><!-- row -->

            <button class="btn btn-info tx-11 tx-spacing-1 tx-semibold pd-y-12 pd-x-30 mg-t-20">Save</button>
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
              <th>Major Code</th>
              <th>Major Sub Code</th>
              <th>Minor Sub Code</th>
              <th style="width: 40%;">Minor Sub Name</th>
              <th>Action</th>

            </tr>
          </thead>

          <tbody id="updated-row">
            <tr>
              @foreach($minor4 as $minor)
              <tr>
                <td>{{$minor->mjr_cat_code}}</td>
                <td>{{$minor->mjr_sub_cat_code}}</td>
                <td>{{$minor->mnr_sub_cat_code}}</td>
                <td>{{$minor->mnr_sub_cat_desc}}</td>
                <td>
                  <a href="{{ route('item.add',$minor->mnr_sub_cat_id) }}" class="btn btn-info btn-sm" >Item</i></a>
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