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


  <form action="{{ Route('supplier.store') }}" method="POST">
    @csrf
      <div class="card bd-0 shadow-base pd-25 pd-xs-40 mg-t-20">
        <div class="card-header bg-transparent pd-0 bd-b-0">
          <h5 class="text-primary tx-18 tx-spacing-1 tx-bold tx-inverse">Supplier</h5>
          <!-- <p class="tx-14 mg-b-20 mg-xs-b-30">Earn miles when you book a flight to any destination.</p> -->
        </div><!-- card-header -->
        <div class="container card-block pd-0">


          <div class="row row-sm mg-t-20">
            <div class="col-md-4 col-lg-4 mg-t-10 mg-lg-t-0">
              <div class="form-group mg-b-0">
                <label for="p_SUPP_CODE">Code :</label>
                <input type="text" name="p_SUPP_CODE" id="p_SUPP_CODE" class="form-control tx-14" placeholder="Enter Code">
              </div><!-- form-group -->
            </div><!-- col-2 -->

            <div class="col-md-4 col-lg-4 mg-t-10 mg-lg-t-0">
              <div class="form-group mg-b-0">
                <label for="p_SUPP_NAME">Name :</label>
                <input type="text" name="p_SUPP_NAME" id="p_SUPP_NAME" class="form-control tx-14" placeholder="Enter Name">
              </div><!-- form-group -->
            </div><!-- col-2 -->

            <div class="col-md-4 col-lg-4 mg-t-10 mg-lg-t-0">
              <div class="form-group mg-b-0">
                <label for="p_ADDRESS">Address :</label>
                <textarea name="p_ADDRESS" id="p_ADDRESS" class="form-control tx-14" placeholder="Enter Address"></textarea>
              </div><!-- form-group -->
            </div><!-- col-2 -->
          
            <div class="col-md-4 col-lg-4 mg-t-10 mg-lg-t-0">
              <div class="form-group mg-b-0">
                <label for="p_CONT_PERSON">Contact Person :</label>
                <input type="text" name="p_CONT_PERSON" id="p_CONT_PERSON" class="form-control tx-14" placeholder="Enter Contact Person ">
              </div><!-- form-group -->
            </div><!-- col-2 -->

            <div class="col-md-4 col-lg-4 mg-t-10 mg-lg-t-0">
              <div class="form-group mg-b-0">
                <label for="p_MOBILE_NO">Mobile No :</label>
                <input type="number" name="p_MOBILE_NO" id="p_MOBILE_NO" class="form-control tx-14" placeholder="Enter Mobile Number">
              </div><!-- form-group -->
            </div><!-- col-2 -->

            <div class="col-md-4 col-lg-4 mg-t-10 mg-lg-t-0">
              <div class="form-group mg-b-0">
                <label for="p_EMAIL_ADDR">E-mail :</label>
                <input type="email" name="p_EMAIL_ADDR" id="p_EMAIL_ADDR" class="form-control tx-14" placeholder="Enter E-mail Address">
              </div><!-- form-group -->
            </div><!-- col-2 -->

          </div><!-- row -->

          <button class="btn btn-info tx-11 tx-spacing-1 tx-semibold pd-y-12 pd-x-30 mg-t-10">Save</button>
        </div><!-- card-block -->
      </div><!-- card -->

  </form>


  <div class="card bd-0 shadow-base mt-3">
    <div class="card-header bg-transparent pd-0 bd-b-0">
      <div class="card-block pd-0">

        <table class="table table-bordered table-sm table-striped">
          <thead class="thead-dark">
            <tr>
              <th>Code</th>
              <th>Name</th>
              <th>Address</th>
              <th>Contact Person</th>
              <th>Mobile No</th>
              <th>Email Address</th>
              <th>Action</th>
              <th>Products of Supplier</th>
            </tr>
          </thead>

          <tbody id="updated-row">
            <tr>
            @foreach($supplier as $supplier)
              <tr>
                <td>{{$supplier['SUPP_CODE']}}</td>
                <td>{{$supplier['SUPP_NAME']}}</td>
                <td>{{$supplier['ADDRESS']}}</td>
                <td>{{$supplier['CONT_PERSON']}}</td>
                <td>{{$supplier['MOBILE_NO']}}</td>
                <td>{{$supplier['EMAIL_ADDR']}}</td>

                <td class="report">
                <div class="d-flex">
                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editfromModal{{$supplier['SUPP_ID']}}"><i class="fa fa-edit"></i></button>

                    <button type="button" class="btn btn-danger btn-sm ml-2" data-toggle="modal" data-target="#deletefromModal{{$supplier['SUPP_ID']}}"><i class="fa fa-trash"></i></button>
                </div class="d-flex">
                
              </td>
              <td>
                <div class="d-flex">
                    <a href="{{ route('supplier.supplier_product',$supplier['SUPP_ID']) }}" class="btn btn-info btn-sm ml-3">Products of Supplier</a>
                </div>
              </td>
                
              </tr>

<!-- Delete Modal -->
<div class="modal fade" id="deletefromModal{{$supplier['SUPP_ID']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <a href="{{ Route('supplier.delete', $supplier['SUPP_ID']) }}" type="button" class="btn btn-danger">Delete</a>
      </div>
    </div>
  </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editfromModal{{$supplier['SUPP_ID']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Item</h5>
      </div>
      <div class="modal-body">
        <form  action="{{ Route('supplier.update',$supplier['SUPP_ID']) }}" method="POST">
          @csrf
          <span>Code :</span>
          <input value="{{$supplier['SUPP_CODE']}}" type="text" name="SUPP_CODE" id="SUPP_CODE" class="mb-3 form-control" placeholder="Enter Code">
          <span>Name :</span>
          <input value="{{$supplier['SUPP_NAME']}}" type="text" name="SUPP_NAME" id="SUPP_NAME" placeholder="Enter Name" class="mb-3 form-control">
          <span>Adress :</span>
          <input value="{{$supplier['ADDRESS']}}" type="text" name="ADDRESS" id="ADDRESS" placeholder="Enter Address" class="mb-3 form-control">
          <span>Contact Person :</span>
          <input value="{{$supplier['CONT_PERSON']}}" type="text" name="CONT_PERSON" id="CONT_PERSON" placeholder="Enter Contact Person" class="mb-3 form-control">
          <span>Mobile No :</span>
          <input value="{{$supplier['MOBILE_NO']}}" type="number" name="MOBILE_NO" id="MOBILE_NO" placeholder="Enter Mobile Number" class="mb-3 form-control">
          <span>E-mail :</span>
          <input value="{{$supplier['EMAIL_ADDR']}}" type="email" name="EMAIL_ADDR" id="EMAIL_ADDR" placeholder="Enter E-mail Address" class="mb-3 form-control">
          
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

          </tbody>
        </table>

      </div>
    </div>
  </div>
  
@endsection