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


  <form action="{{ Route('supplier.storedtl',$supplier->supp_id) }}" method="POST">
    @csrf
      <div class="card bd-0 shadow-base pd-25 pd-xs-40 mg-t-20">
        <div class="card-header bg-transparent pd-0 bd-b-0">
          <h5 class="text-primary tx-18 tx-spacing-1 tx-bold tx-inverse">Supplier Product</h5>
          <!-- <p class="tx-14 mg-b-20 mg-xs-b-30">Earn miles when you book a flight to any destination.</p> -->
        </div><!-- card-header -->
        <div class="container card-block pd-0">


          <div class="row row-sm mg-t-20">
            <div class="col-md-4 col-lg-4 mg-t-10 mg-lg-t-0">
              <div class="form-group mg-b-0">
                <label for="p_SUPP_CODE">Code :</label>
                <input readonly value="{{$supplier->supp_code}}" type="text" name="p_SUPP_CODE" id="p_SUPP_CODE" class="form-control tx-14" placeholder="Enter Code">
              </div><!-- form-group -->
            </div><!-- col-2 -->

            <div class="col-md-8 col-lg-8 mg-t-10 mg-lg-t-0">
              <div class="form-group mg-b-0">
                <label for="p_SUPP_NAME">Name :</label>
                <input readonly value="{{$supplier->supp_name}}" type="text" name="p_SUPP_NAME" id="p_SUPP_NAME" class="form-control tx-14" placeholder="Enter Name">
              </div><!-- form-group -->
            </div><!-- col-2 -->

            <div class="col-md-3 col-lg-3">
              <div class="form-group mg-b-0">
                <label class="d-block">Major Category :</label>
                <select id="mjr_cat" name="mjr_cat" class="form-control wd-100p" data-placeholder="Choose origin">
                  <option value="">---Major Category---</option>
                  @foreach($supplier1 as $major_cat)
                  <option value="{{$major_cat->mjr_cat_code}}">{{$major_cat->mjr_cat_id}}~{{$major_cat->mjr_cat_desc}}</option>
                  @endforeach
                </select>
              </div><!-- form-group -->
            </div><!-- col-3 -->

            <div class="col-md-3 col-lg-3">
              <div class="form-group mg-b-0">
                <label class="d-block">Major Sub Category :</label>
                <select id="mjr_sub_cat" name="mjr_sub_cat" class="form-control wd-100p" data-placeholder="Choose origin">
                  <option value="">---Major Sub Category---</option>
                  
                </select>
              </div><!-- form-group -->
            </div><!-- col-3 -->

            <div class="col-md-3 col-lg-3">
              <div class="form-group mg-b-0">
                <label class="d-block">Minor Sub Category :</label>
                <select id="mnr_sub_cat" name="mnr_sub_cat" class="form-control wd-100p" data-placeholder="Choose origin">
                  <option value="">---Minor Sub Category---</option>
                  
                </select>
              </div><!-- form-group -->
            </div><!-- col-3 -->

            <div class="col-md-3 col-lg-3">
              <div class="form-group mg-b-0">
                <label class="d-block">Item :</label>
                <select id="item" name="item" class="form-control wd-100p" data-placeholder="Choose origin">
                  <option value="">---Item---</option>
                  
                </select>
              </div><!-- form-group -->
            </div><!-- col-3 -->

            <div class="col-md-3 col-lg-3 mg-t-10 mg-lg-t-0">
              <div class="form-group mg-b-0">
                <label for="item_code">Item Code :</label>
                <input readonly type="number" name="item_code" id="item_code" class="form-control tx-14" placeholder="Enter Item Code">
              </div><!-- form-group -->
            </div><!-- col-2 -->

            <div class="col-md-3 col-lg-3 mg-t-10 mg-lg-t-0">
              <div class="form-group mg-b-0">
                <label for="item_name">Item Name :</label>
                <input readonly type="text" name="item_name" id="item_name" class="form-control tx-14" placeholder="Enter Item Name">
              </div><!-- form-group -->
            </div><!-- col-2 -->

            <div class="col-md-3 col-lg-3 mg-t-10 mg-lg-t-0">
              <div class="form-group mg-b-0">
                <label for="p_Last_pur_date">Last Purchase Date :</label>
                <input type="date" name="p_Last_pur_date" id="p_Last_pur_date" class="form-control tx-14">
              </div><!-- form-group -->
            </div><!-- col-2 -->

            <div class="col-md-3 col-lg-3 mg-t-10 mg-lg-t-0">
              <div class="form-group mg-b-0">
                <label for="p_LAST_PUR_RATE">Last Purchase Rate :</label>
                <input type="number" name="p_LAST_PUR_RATE" id="p_LAST_PUR_RATE" class="form-control tx-14" placeholder="Enter Last Purchase Rate">
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
              <th></th>
              <th>Supp Name</th>
              <th>Item Name</th>
              <th>Last Purchase Date</th>
              <th>Last Purchase Rate</th>
              <th class="abcd">Action</th>

            </tr>
          </thead>

          <tbody id="updated-row">

            <tr>
            @foreach($supplier3 as $supplier)
            
            <tr>
              <td></td>
              <td>{{ $supplier->supp_name }}</td>
              <td>{{ $supplier->item_name }}</td>
              <td>{{ $supplier->last_pur_date }}</td>
              <td>{{ $supplier->last_pur_rate }}</td>
              
              <td class="defg">
                <div class="d-flex">
                  <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editfromModal{{ $supplier->supp_prod_id }}"><i class="fa fa-edit"></i></button>

                  <button type="button" class="btn btn-danger btn-sm ml-2" data-toggle="modal" data-target="#deletefromModal{{ $supplier->supp_prod_id }}"><i class="fa fa-trash"></i></button>
                </div>
              </td>

            </tr>

<!-- Delete Modal -->
<div class="modal fade" id="deletefromModal{{ $supplier->supp_prod_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <a href="{{ Route('supplier.deletedtl',$supplier->supp_prod_id) }}" type="button" class="btn btn-danger">Delete</a>
      </div>
    </div>
  </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editfromModal{{ $supplier->supp_prod_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Item</h5>
      </div>
      <div class="modal-body">
        <form action="{{ Route('supplier.updatedtl',$supplier->supp_prod_id) }}" method="POST">
          @csrf
          <span>Supp Name :</span>
          <input readonly value="{{ $supplier->supp_name }}" type="text" name="supp_name" id="supp_name" class="mb-3 form-control">
          
          <span>Item Name :</span>
          <input readonly value="{{ $supplier->item_name }}" type="text" name="item_name" id="item_name" class="mb-3 form-control">

          <span>Last Purchase Date :</span>
          <input value="{{ date('Y-m-d', strtotime($supplier->last_pur_date))}}" type="date" name="last_pur_date" id="last_pur_date" class="mb-3 form-control">

          <span>Last Purchase Rate :</span>
          <input value="{{ $supplier->last_pur_rate }}" type="number" name="last_pur_rate" id="last_pur_rate" class="mb-3 form-control">

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
</div>

@endsection