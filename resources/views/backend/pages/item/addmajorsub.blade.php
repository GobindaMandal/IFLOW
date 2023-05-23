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
          <a href="{{ route('major.add') }}" class="btn btn-secondary btn-sm"><i class="fa fa-arrow-left"></i></a>
        </div>
      </div>
    </div>


    <form action="{{ Route('majorsub.store') }}" method="POST">
      @csrf
      <div class="card bd-0 shadow-base pd-25 pd-xs-40 mg-t-20">
        <div class="card-header bg-transparent pd-0 bd-b-0">
            <h5 class="text-primary tx-18 tx-spacing-1 tx-bold tx-inverse">Major Sub Item</h5>
            <!-- <p class="tx-14 mg-b-20 mg-xs-b-30">Earn miles when you book a flight to any destination.</p> -->
        </div><!-- card-header -->
        <div class="container card-block pd-0">


            <div class="row row-sm mg-t-20">

              <div class="col-md-4 col-lg-4 mg-t-10 mg-lg-t-0">
                <div>
                  <label for="mjr_cat_code">Major Code :</label>
                  <input readonly  value="{{$major->mjr_cat_code}}" type="number" name="mjr_cat_code" id="mjr_cat_code" class="form-control tx-14 printpurchase" placeholder="Major Code">
                </div><!-- form-group -->
              </div><!-- col-2 -->

              <div class="col-md-2 col-lg-2 mg-t-10 mg-lg-t-0">
                
              </div><!-- col-2 -->

              <div class="col-md-4 col-lg-4 mg-t-10 mg-lg-t-0">
                <div>
                  <label for="mjr_cat_desc">Major Name :</label>
                  <input readonly  value="{{$major->mjr_cat_desc}}" type="text" name="mjr_cat_desc" id="mjr_cat_desc" class="form-control tx-14 printpurchase" placeholder="Major Name">
                </div><!-- form-group -->
              </div><!-- col-2 -->

            </div><!-- row -->

            <div class="row row-sm mg-t-20">

              <div class="col-md-4 col-lg-4 mg-t-10 mg-lg-t-0">
                <div>
                  <label for="p_MJR_sub_CAT_CODE">Major Sub Code :</label>
                  <input type="number" name="p_MJR_sub_CAT_CODE" id="p_MJR_sub_CAT_CODE" class="form-control tx-14 printpurchase" placeholder="Enter Major Sub Code">
                </div><!-- form-group -->
              </div><!-- col-2 -->

              <div class="col-md-2 col-lg-2 mg-t-10 mg-lg-t-0">
                
              </div><!-- col-2 -->

              <div class="col-md-4 col-lg-4 mg-t-10 mg-lg-t-0">
                <div>
                  <label for="p_MJR_sub_CAT_DESC">Major Sub Name :</label>
                  <input type="text" name="p_MJR_sub_CAT_DESC" id="p_MJR_sub_CAT_DESC" class="form-control tx-14 printpurchase" placeholder="Enter Major Sub Name">
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
              <th style="width: 40%;">Major Sub Name</th>
              <th>Action</th>
            </tr>
          </thead>

          <tbody id="updated-row">
            <tr>
              @foreach($major2 as $major)
              <tr>
                <td>{{$major->mjr_cat_code}}</td>
                <td>{{$major->mjr_sub_cat_code}}</td>
                <td>{{$major->mjr_sub_cat_desc}}</td>
                <td>
                  <a href="{{ route('minorsub.add',$major->mjr_sub_cat_id) }}" class="btn btn-info btn-sm" >Minor Sub</i></a>
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