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
          <a href="{{ route('minorsub.add', $item4->mjr_sub_cat_id) }}" class="btn btn-secondary btn-sm"><i class="fa fa-arrow-left"></i></a>
        </div>
      </div>
    </div>


    <form action="{{ Route('item.store') }}" method="POST">
      @csrf
      <div class="card bd-0 shadow-base pd-25 pd-xs-40 mg-t-20">
        <div class="card-header bg-transparent pd-0 bd-b-0">
            <h5 class="text-primary tx-18 tx-spacing-1 tx-bold tx-inverse">Item</h5>
            <!-- <p class="tx-14 mg-b-20 mg-xs-b-30">Earn miles when you book a flight to any destination.</p> -->
        </div><!-- card-header -->
        <div class="container card-block pd-0">


          <div class="row row-sm mg-t-20">

              <div class="col-md-4 col-lg-4 mg-t-10 mg-lg-t-0">
                <div class="form-group mg-b-0">
                  <label for="mjr_cat_code">Major Code :</label>
                  <input readonly  value="{{$item5->mjr_cat_code}}" type="number" name="mjr_cat_code" id="mjr_cat_code" class="form-control tx-14" placeholder="Major Code">
                </div><!-- form-group -->
              </div><!-- col-2 -->

              <div class="col-md-4 col-lg-4 mg-t-10 mg-lg-t-0">
                <div class="form-group mg-b-0">
                  <label for="mjr_cat_desc">Major Name :</label>
                  <input readonly  value="{{$item5->mjr_cat_desc}}" type="text" name="mjr_cat_desc" id="mjr_cat_desc" class="form-control tx-14" placeholder="Major Name">
                </div><!-- form-group -->
              </div><!-- col-2 -->

              <div class="col-md-4 col-lg-4 mg-t-10 mg-lg-t-0">
                <div class="form-group mg-b-0">
                  <label for="mjr_sub_cat_code">Major Sub Code :</label>
                  <input readonly  value="{{$item4->mjr_sub_cat_code}}" type="number" name="mjr_sub_cat_code" id="mjr_sub_cat_code" class="form-control tx-14" placeholder="Major Sub Code">
                </div><!-- form-group -->
              </div><!-- col-2 -->

              <div class="col-md-4 col-lg-4 mg-t-10 mg-lg-t-0">
                <div class="form-group mg-b-0">
                  <label for="mjr_sub_cat_desc">Major Sub Name :</label>
                  <input readonly value="{{$item4->mjr_sub_cat_desc}}" type="text" name="mjr_sub_cat_desc" id="mjr_sub_cat_desc" class="form-control tx-14" placeholder="Enter Major Sub Name">
                </div><!-- form-group -->
              </div><!-- col-2 -->

              <div class="col-md-4 col-lg-4 mg-t-10 mg-lg-t-0">
                <div class="form-group mg-b-0">
                  <label for="mnr_sub_cat_code">Minor Sub Code :</label>
                  <input readonly  value="{{$item->mnr_sub_cat_code}}" type="number" name="mnr_sub_cat_code" id="mnr_sub_cat_code" class="form-control tx-14" placeholder="Minor Sub Code">
                </div><!-- form-group -->
              </div><!-- col-2 -->

              <div class="col-md-4 col-lg-4 mg-t-10 mg-lg-t-0">
                <div class="form-group mg-b-0">
                  <label for="mnr_sub_cat_desc">Minor Sub Name :</label>
                  <input readonly value="{{$item->mnr_sub_cat_desc}}" type="text" name="mnr_sub_cat_desc" id="mnr_sub_cat_desc" class="form-control tx-14" placeholder="Minor Sub Name">
                </div><!-- form-group -->
              </div><!-- col-2 -->


              <div class="col-md-4 col-lg-4 mg-t-10 mg-lg-t-0">
                <div class="form-group mg-b-0">
                  <label for="p_ITEM_CODE">Item Code :</label>
                  <input type="name" name="p_ITEM_CODE" id="p_ITEM_CODE" class="form-control tx-14" placeholder="Enter Item Code">
                </div><!-- form-group -->
              </div><!-- col-2 -->

              <div class="col-md-4 col-lg-4 mg-t-10 mg-lg-t-0">
                <div class="form-group mg-b-0">
                  <label for="p_SL_NO">Serial No. :</label>
                  <input type="number" name="p_SL_NO" id="p_SL_NO" class="form-control tx-14" placeholder="Enter Serial No.">
                </div><!-- form-group -->
              </div><!-- col-2 -->

              <div class="col-md-4 col-lg-4 mg-t-10 mg-lg-t-0">
                <div class="form-group mg-b-0">
                  <label for="p_ITEM_NAME">Item Name :</label>
                  <input type="text" name="p_ITEM_NAME" id="p_ITEM_NAME" class="form-control tx-14" placeholder="Enter Item Name">
                </div><!-- form-group -->
              </div><!-- col-2 -->

              <div class="col-md-4 col-lg-4 mg-t-10 mg-lg-t-0">
                <div class="form-group mg-b-0">
                  <label for="p_DESCRIPTION">Description :</label>
                  <textarea name="p_DESCRIPTION" id="p_DESCRIPTION" class="form-control tx-14" placeholder="Enter Description"></textarea>
                  <!-- <input type="text" name="p_DESCRIPTION" id="p_DESCRIPTION" class="form-control tx-14" placeholder="Enter Description"> -->
                </div><!-- form-group -->
              </div><!-- col-2 -->

              <div class="col-md-4 col-lg-4 mg-t-10 mg-lg-t-0">
                <div class="form-group mg-b-0">
                  <label for="p_BRAND_NAME">Brand :</label>
                  <input type="text" name="p_BRAND_NAME" id="p_BRAND_NAME" class="form-control tx-14" placeholder="Enter Brand">
                </div><!-- form-group -->
              </div><!-- col-2 -->

              <div class="col-md-4 col-lg-4 mg-t-10 mg-lg-t-0">
                <div class="form-group mg-b-0">
                  <label for="p_MODEL_NAME">Model :</label>
                  <input type="text" name="p_MODEL_NAME" id="p_MODEL_NAME" class="form-control tx-14" placeholder="Enter Model">
                </div><!-- form-group -->
              </div><!-- col-2 -->

              <div class="col-md-3 col-lg-3 mg-t-10 mg-lg-t-0">
                <div class="form-group mg-b-0">
                  <label for="p_UNIT_CODE">Unit :</label>
                  <input type="text" name="p_UNIT_CODE" id="p_UNIT_CODE" class="form-control tx-14" placeholder="Enter Unit">
                </div><!-- form-group -->
              </div><!-- col-2 -->

              <div class="col-md-3 col-lg-3 mg-t-10 mg-lg-t-0">
                <div class="form-group mg-b-0">
                  <label for="p_DATE_ACTIVE">Activate Date :</label>
                  <input type="date" name="p_DATE_ACTIVE" id="p_DATE_ACTIVE" class="form-control form-control tx-14">
                </div><!-- form-group -->
              </div><!-- col-2 -->

              <div class="col-md-3 col-lg-3 mg-t-10 mg-lg-t-0">
                <div class="form-group mg-b-0">
                  <label for="p_REORDER_LEVEL">Reorder Level :</label>
                  <input type="text" name="p_REORDER_LEVEL" id="p_REORDER_LEVEL" class="form-control tx-14" placeholder="Enter Reorder Level">
                </div><!-- form-group -->
              </div><!-- col-2 -->

              <div class="col-md-3 col-lg-3 mg-t-10 mg-lg-t-0">
                <div class="form-group mg-b-0">
                  <label for="p_REMARKS_ITEM">Remarks :</label>
                  <input type="text" name="p_REMARKS_ITEM" id="p_REMARKS_ITEM" class="form-control tx-14" placeholder="Enter Remarks ">
                </div><!-- form-group -->
              </div><!-- col-2 -->

              <div class="col-md-3 col-lg-3 mg-t-10 mg-lg-t-0">
                <div class="form-group mg-b-0">
                  <label for="p_OPN_BAL">Opening Balance :</label>
                  <input type="text" name="p_OPN_BAL" id="p_OPN_BAL" class="form-control tx-14" placeholder="Enter Opening Balance ">
                </div><!-- form-group -->
              </div><!-- col-2 -->

              <div class="col-md-3 col-lg-3 mg-t-10 mg-lg-t-0">
                <div class="form-group mg-b-0">
                  <label for="p_OPN_VAL">Opening Value :</label>
                  <input type="text" name="p_OPN_VAL" id="p_OPN_VAL" class="form-control tx-14" placeholder="Enter Opening Value ">
                </div><!-- form-group -->
              </div><!-- col-2 -->

            </div><!-- row -->

            <button class="btn btn-info tx-11 tx-spacing-1 tx-semibold pd-y-12 pd-x-30 mg-t-10">Save</button>
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
              <th>Item Code</th>
              <th>Serial No.</th>
              <th>Short Code</th>
              <th>Name</th>
              <th>Description</th>
              <th>Brand</th>
              <th>Model</th>
              <th>Unit Name</th>
              <th>Activate Date</th>
              <th>Record Level</th>
              <th>Remarks</th>
              <th>Opening Balance</th>
              <th>Opening Value</th>
              <th class="abcd">Action</th>

            </tr>
          </thead>

          <tbody id="updated-row">
            
            <tr>
            @foreach($item6 as $item)
            <tr>

              <td class="tx-14">{{$item->item_code}}</td>
              <td class="tx-14">{{$item->sl_no}}</td>
              <td class="tx-14">{{$item->short_code}}</td>
              <td class="tx-14">{{$item->item_name}}</td>
              <td class="tx-14">{{$item->description}}</td>
              <td class="tx-14">{{$item->brand_name}}</td>
              <td class="tx-14">{{$item->model_name}}</td>
              <td class="tx-14">{{$item->unit_code}}</td>
              <td class="tx-14">{{$item->date_active}}</td>
              <td class="tx-14">{{$item->reorder_level}}</td>
              <td class="tx-14">{{$item->remarks_item}}</td>
              <td class="tx-14">{{$item->opn_bal}}</td>
              <td class="tx-14">{{$item->opn_val}}</td>
              
              <td class="defg">
                <div class="d-flex">
                  <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editfromModal{{$item->item_id}}"><i class="fa fa-edit"></i></button>

                  <button type="button" class="btn btn-danger btn-sm ml-2" data-toggle="modal" data-target="#deletefromModal{{$item->item_id}}"><i class="fa fa-trash"></i></button>
                </div>
              </td>

            </tr>

<!-- Delete Modal -->
<div class="modal fade" id="deletefromModal{{$item->item_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <a href="{{ Route('item.deletedtl', $item->item_id) }}" type="button" class="btn btn-danger">Delete</a>
      </div>
    </div>
  </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editfromModal{{$item->item_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Item</h5>
      </div>
      <div class="modal-body">

        <form action="{{ Route('item.updatedtl',$item->item_id) }}" method="POST">
          @csrf
          <span>Item Code :</span>
          <input value="{{ $item->item_code }}" type="number" name="item_code" id="item_code" class="mb-3 form-control">
          <span>Serial No. :</span>
          <input value="{{ $item->sl_no }}" type="number" name="sl_no" id="sl_no" class="mb-3 form-control">
          <span>Short Code :</span>
          <input value="{{ $item->short_code }}" type="number" name="short_code" id="short_code" class="mb-3 form-control">
          <span>Name :</span>
          <input value="{{ $item->item_name }}" type="text" name="item_name" id="item_name" class="mb-3 form-control">
          <span>Description :</span>
          <textarea name="description" id="description" class="mb-3 form-control">{{ $item->description }}</textarea>
          <!-- <input value="{{ $item->description }}" type="text" name="description" id="description" class="mb-3 form-control"> -->
          <span>Brand :</span>
          <input value="{{ $item->brand_name }}" type="text" name="brand_name" id="brand_name" class="mb-3 form-control">
          <span>Model :</span>
          <input value="{{ $item->model_name }}" type="text" name="model_name" id="model_name" class="mb-3 form-control">
          <span>Unit :</span>
          <input value="{{ $item->unit_code }}" type="number" name="unit_code" id="unit_code" class="mb-3 form-control">
          <span>Activate Date :</span>
          <input value="{{ date('Y-m-d', strtotime($item->date_active)) }}" type="date" name="date_active" id="date_active" class="mb-3 form-control">
          <span>Reorder Level :</span>
          <input value="{{ $item->reorder_level }}" type="text" name="reorder_level" id="reorder_level" class="mb-3 form-control">
          <span>Remarks :</span>
          <input value="{{ $item->remarks_item }}" type="text" name="remarks_item" id="remarks_item" class="mb-3 form-control">
          <span>Opening Balance :</span>
          <input value="{{ $item->opn_bal }}" type="number" name="opn_bal" id="opn_bal" class="mb-3 form-control">
          <span>Opening Value :</span>
          <input value="{{ $item->opn_val }}" type="number" name="opn_val" id="opn_val" class="mb-3 form-control">
          
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

@endsection