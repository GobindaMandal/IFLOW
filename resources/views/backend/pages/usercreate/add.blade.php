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


  <form action="{{ Route('usercreate.store') }}" method="POST">
    @csrf
      <div class="card bd-0 shadow-base pd-25 pd-xs-40 mg-t-20">
        <div class="card-header bg-transparent pd-0 bd-b-0">
          <h5 class="text-primary tx-18 tx-spacing-1 tx-bold tx-inverse">User</h5>
          <!-- <p class="tx-14 mg-b-20 mg-xs-b-30">Earn miles when you book a flight to any destination.</p> -->
        </div><!-- card-header -->
        <div class="container card-block pd-0">

          <div class="row row-sm mg-t-20">

            <div class="col-md-4 col-lg-4">
              <div class="form-group mg-b-0">
                <label class="d-block">Office :</label>
                <select id="officecode" name="officecode" class="form-control wd-100p" data-placeholder="Choose origin">
                  <option value="">---Select Office---</option>
                  @foreach($usercreate as $office)
                  <option value="{{$office->office_code}}">{{$office->office_desc}}</option>
                  @endforeach
                </select>
              </div><!-- form-group -->
            </div><!-- col-3 -->

            <div class="col-md-4 col-lg-4 mg-t-10 mg-lg-t-0">
              <div class="form-group mg-b-0">
                <label for="username">User Name :</label>
                <input type="text" name="username" id="username" class="form-control tx-14" placeholder="Enter User Name">
              </div><!-- form-group -->
            </div><!-- col-2 -->

            <div class="col-md-4 col-lg-4">
              <div class="form-group mg-b-0">
                <label class="d-block">User Type :</label>
                <select id="usertype" name="usertype" class="form-control wd-100p" data-placeholder="Choose origin">
                  <option value="">---Select User Type---</option>
                  @foreach($usercreate1 as $user_type)
                  <option value="{{$user_type->user_type}}">{{$user_type->user_type_desc}}</option>
                  @endforeach
                </select>
              </div><!-- form-group -->
            </div><!-- col-3 -->

            <div class="col-md-4 col-lg-4 mg-t-10 mg-lg-t-0">
              <div class="form-group mg-b-0">
                <label for="userid">User ID :</label>
                <input type="text" name="userid" id="userid" class="form-control tx-14" placeholder="Enter User ID">
              </div><!-- form-group -->
            </div><!-- col-2 -->

            <div class="col-md-4 col-lg-4 mg-t-10 mg-lg-t-0">
              <div class="form-group mg-b-0">
                <label for="password">Password :</label>
                <input type="password" name="password" id="password" class="form-control tx-14" placeholder="Enter Password">
              </div><!-- form-group -->
            </div><!-- col-2 -->
          
            <div class="col-md-4 col-lg-4 mg-t-10 mg-lg-t-0">
              <div class="form-group mg-b-0">
                <label for="conpassword">Confirm Password :</label>
                <input type="password" name="conpassword" id="conpassword" class="form-control tx-14" placeholder="Enter Confirm Password">
              </div><!-- form-group -->
            </div><!-- col-2 -->

            <div class="col-md-4 col-lg-4 mg-t-10 mg-lg-t-0">
              <div class="form-group mg-b-0">
                <label for="mobileno">Mobile No :</label>
                <input type="number" name="mobileno" id="mobileno" class="form-control tx-14" placeholder="Enter Mobile Number">
              </div><!-- form-group -->
            </div><!-- col-2 -->

            <div class="col-md-4 col-lg-4 mg-t-10 mg-lg-t-0">
              <div class="form-group mg-b-0">
                <label for="emailadrs">E-mail :</label>
                <input type="email" name="emailadrs" id="emailadrs" class="form-control tx-14" placeholder="Enter E-mail Address">
              </div><!-- form-group -->
            </div><!-- col-2 -->

          </div><!-- row -->

          <button class="btn btn-info tx-11 tx-spacing-1 tx-semibold pd-y-12 pd-x-30 mg-t-10">Save</button>
        </div><!-- card-block -->
      </div><!-- card -->

  </form>


  <div class="card bd-0 shadow-base pd-25 pd-xs-40 mg-t-20">
    <div class="card-header bg-transparent pd-0 bd-b-0">
      <div class="card-block pd-0">

        <table class="table table-bordered table-sm table-striped">
          <thead class="thead-dark">
            <tr>
              <th>Office Code</th>
              <th>Office Name</th>
              <th>User</th>
              <th>User type</th>
              <th>User ID</th>
              <th>Mobile No</th>
              <th>Email Address</th>
              <th>Action</th>
            </tr>
          </thead>

          <tbody id="updated-row">
            <tr>
            @foreach($usercreate2 as $user)
              <tr>
                <td>{{$user->office_code}}</td>
                <td>{{$user->office_name}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->user_type_name}}</td>
                <td>{{$user->user_name}}</td>
                <td>{{$user->mobile}}</td>
                <td>{{$user->email}}</td>

                <td class="report">
                <div class="d-flex">
                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editfromModal{{$user->user_id}}"><i class="fa fa-edit"></i></button>

                    <button type="button" class="btn btn-danger btn-sm ml-2" data-toggle="modal" data-target="#deletefromModal{{$user->user_id}}"><i class="fa fa-trash"></i></button>
                </div class="d-flex">
                </td>
                
              </tr>

<!-- Delete Modal -->
<div class="modal fade" id="deletefromModal{{$user->user_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmation Message</h5>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this user?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="{{ Route('usercreate.delete', $user->user_id) }}" type="button" class="btn btn-danger">Delete</a>
      </div>
    </div>
  </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editfromModal{{$user->user_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
      </div>
      <div class="modal-body">
        <form  action="{{ Route('usercreate.update',$user->user_id) }}" method="POST">
          @csrf
          <span>Office Code :</span>
          <select class="form-control mb-3" name="office_code" id="office_code"  aria-label=".form-select-lg example">
            @foreach($usercreate as $office)
            <option value="{{$office->office_code}}" {{$office->office_code == $user->office_code  ? 'selected' : ''}}>{{$office->office_desc}}</option>
            @endforeach
          </select>

          <span>User Name :</span>
          <input value="{{$user->name}}" type="text" name="name" id="name" class="mb-3 form-control" placeholder="Enter User">

          <span>User Type :</span>
          <select class="form-control mb-3" name="user_type" id="user_type"  aria-label=".form-select-lg example">
            @foreach($usercreate1 as $user_type)
            <option value="{{$user_type->user_type}}" {{$user_type->user_type == $user->user_type  ? 'selected' : ''}}>{{$user_type->user_type_desc}}</option>
            @endforeach
          </select>

          <span>User ID :</span>
          <input value="{{$user->user_name}}" type="text" name="user_name" id="user_name" class="mb-3 form-control" placeholder="Enter User ID">

          <span>Mobile No :</span>
          <input value="{{$user->mobile}}" type="text" name="mobile" id="mobile" class="mb-3 form-control" placeholder="Enter Mobile No">

          <span>E-mail Address :</span>
          <input value="{{$user->email}}" type="text" name="email" id="email" class="mb-3 form-control" placeholder="Enter E-mail Address">
          
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