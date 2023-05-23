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


  <form action="{{ Route('office.store',$offices1->office_id) }}" method="POST">
    @csrf
      <div class="card bd-0 shadow-base pd-25 pd-xs-40 mg-t-20">
        <div class="card-header bg-transparent pd-0 bd-b-0">
          <h5 class="text-primary tx-18 tx-spacing-1 tx-bold tx-inverse">Office</h5>

          <!-- tree view -->
          <div class="border-box ml-5">

            <ul id="myUL">
            @foreach($offices as $office)
              <li><span class="caret"><a href="{{ route('office.add',$office->office_id) }}">{{$office->office_desc}}~{{$office->office_code}}</a></span>

                <ul class="nested">
                @foreach($office->childs as $child)
                  <li><span class="caret"><a href="{{ route('office.add',$child->office_id) }}">{{$child->office_desc}}~{{$child->office_code}}</a></span>

                    <ul class="nested">
                    @foreach($child->subChild as $subChild)
                      <li><span class="caret"><a href="{{ route('office.add',$subChild->office_id) }}">{{$subChild->office_desc}}~{{$subChild->office_code}}</a></span>

                        <ul class="nested">
                        @foreach($subChild->subChild1 as $subChild1)
                          <li><span class="caret"><a href="{{ route('office.add',$subChild1->office_id) }}">{{$subChild1->office_desc}}~{{$subChild1->office_code}}</a></span>

                            <ul class="nested">
                            @foreach($subChild1->subChild2 as $subChild2)
                              <li><span class="caret"><a href="{{ route('office.add',$subChild2->office_id) }}">{{$subChild2->office_desc}}~{{$subChild2->office_code}}</a></span>

                                <ul class="nested">
                                @foreach($subChild2->subChild3 as $subChild3)
                                  <li><span class="caret"><a href="{{ route('office.add',$subChild3->office_id) }}">{{$subChild3->office_desc}}~{{$subChild3->office_code}}</a></span>

                                    <ul class="nested">
                                    @foreach($subChild3->subChild4 as $subChild4)
                                      <li><a href="{{ route('office.add',$subChild4->office_id) }}">{{$subChild4->office_desc}}~{{$subChild4->office_code}}</a></li>
                                    @endforeach
                                    </ul>
                                  @endforeach
                                </ul>
                              </li>
                            @endforeach
                            </ul>
                          </li>
                        @endforeach
                        </ul>
                      </li>
                    @endforeach
                    </ul>
                  </li>
                @endforeach
                </ul>
              </li>
            @endforeach

            </ul>

            <style>
              /* Remove default bullets */
              ul, #myUL {
                list-style-type: none;
              }

              /* Remove margins and padding from the parent ul */
              #myUL {
                margin: 0;
                padding: 0;
              }

              /* Style the caret/arrow */
              .caret {
                cursor: pointer;
                user-select: none; /* Prevent text selection */
              }

              /* Create the caret/arrow with a unicode, and style it */
              .caret::before {
                content: "\25B6";
                color: black;
                display: inline-block;
                margin-right: 6px;
              }

              /* Rotate the caret/arrow icon when clicked on (using JavaScript) */
              .caret-down::before {
                transform: rotate(90deg);
              }

              /* Hide the nested list */
              .nested {
                display: none;
              }

              /* Show the nested list when the user clicks on the caret/arrow (with JavaScript) */
              .active {
                display: block;
              }

              .border-box {
                border: 1px solid black;
                padding: 10px;
                width: 90%;
              }
            </style>
            <script>
              var toggler = document.getElementsByClassName("caret");
              var i;

              for (i = 0; i < toggler.length; i++) {
                toggler[i].addEventListener("click", function() {
                  this.parentElement.querySelector(".nested").classList.toggle("active");
                  this.classList.toggle("caret-down");
                });
              }
            </script>
          </div>

          <!-- <p class="tx-14 mg-b-20 mg-xs-b-30">Earn miles when you book a flight to any destination.</p> -->
        </div><!-- card-header -->
        <div class="container card-block pd-0">


          <div class="row row-sm mg-t-20">
            <div class="col-md-8 col-lg-8 mg-t-10 mg-lg-t-0">
              <div class="form-group mg-b-0">
                <label for="p_paRENT_OFFICE_ID">Parent Office :</label>
                <input readonly value="{{$offices1->office_desc}}~{{$offices1->office_code}}" type="text" name="p_paRENT_OFFICE_ID" id="p_paRENT_OFFICE_ID" class="form-control tx-14" placeholder="Enter Parent Office">
              </div><!-- form-group -->
            </div><!-- col-2 -->

            <div class="col-md-4 col-lg-4 mg-t-10 mg-lg-t-0">
              <div class="form-group mg-b-0">
                <label for="p_OFFICE_CODE">Office Code :</label>
                <input type="number" name="p_OFFICE_CODE" id="p_OFFICE_CODE" class="form-control tx-14" placeholder="Enter Office Code">
              </div><!-- form-group -->
            </div><!-- col-2 -->

            <div class="col-md-4 col-lg-4 mg-t-10 mg-lg-t-0">
              <div class="form-group mg-b-0">
                <label for="p_OFFICE_DESC_B">Description (Bangla) :</label>
                <textarea name="p_OFFICE_DESC_B" id="p_OFFICE_DESC_B" cols="30" rows="2" class="form-control tx-14" placeholder="Enter Description"></textarea>
              </div><!-- form-group -->
            </div><!-- col-2 -->

            <div class="col-md-4 col-lg-4 mg-t-10 mg-lg-t-0">
              <div class="form-group mg-b-0">
                <label for="p_OFFICE_DESC">Description :</label>
                <textarea name="p_OFFICE_DESC" id="p_OFFICE_DESC" cols="30" rows="2" class="form-control tx-14" placeholder="Enter Description"></textarea>
              </div><!-- form-group -->
            </div><!-- col-2 -->

            <div class="col-md-4 col-lg-4">
              <div class="form-group mg-b-0">
                <label class="d-block">Type :</label>
                <select id="p_OFFICE_TYPE" name="p_OFFICE_TYPE" class="form-control wd-100p" data-placeholder="Choose origin">
                  <option value="">---Select Type---</option>
                  @foreach($offices2 as $type)
                  <option value="{{$type->office_type}}">{{$type->office_type_desc}}</option>
                  @endforeach
                </select>
              </div><!-- form-group -->
            </div><!-- col-3 -->

            <div class="col-md-4 col-lg-4">
              <div class="form-group mg-b-0">
                <label class="d-block">Level :</label>
                <select id="p_OFFICE_LEVEL_CODE" name="p_OFFICE_LEVEL_CODE" class="form-control wd-100p" data-placeholder="Choose origin">
                  <option value="">---Select Level---</option>
                  @foreach($offices3 as $level)
                  <option value="{{$level->office_level_code}}">{{$level->office_level_desc}}</option>
                  @endforeach
                </select>
              </div><!-- form-group -->
            </div><!-- col-3 -->

            <div class="col-md-4 col-lg-4 mg-t-10 mg-lg-t-0">
              <div class="form-group mg-b-0">
                <label for="p_ADDRESS_B">Address (Bangla) :</label>
                <textarea name="p_ADDRESS_B" id="p_ADDRESS_B" cols="30" rows="2" class="form-control tx-14" placeholder="Enter Description"></textarea>
              </div><!-- form-group -->
            </div><!-- col-2 -->

            <div class="col-md-4 col-lg-4 mg-t-10 mg-lg-t-0">
              <div class="form-group mg-b-0">
                <label for="p_ADDRESS">Address :</label>
                <textarea name="p_ADDRESS" id="p_ADDRESS" cols="30" rows="2" class="form-control tx-14" placeholder="Enter Description"></textarea>
              </div><!-- form-group -->
            </div><!-- col-2 -->

            <!-- <div class="col-md-4 col-lg-4">
              <div class="form-group mg-b-0">
                <label class="d-block">District :</label>
                <select id="p_DIST_CODE" name="p_DIST_CODE" class="form-control wd-100p" data-placeholder="Choose origin">
                  <option value="">---Select District---</option>

                </select>
              </div>
            </div> -->

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
              <th>Parent Office (Bangla)</th>
              <th>Parent Office</th>
              <th>Office Code</th>
              <th>Description (Bangla)</th>
              <th>Description</th>
              <th>Type of Office</th>
              <th>Level of Office</th>
              <th>Address (Bangla)</th>
              <th>Address</th>
              <th>Action</th>

            </tr>
          </thead>

          <tbody id="updated-row">
            <tr class="insertdtl">

            @foreach($offices5 as $offices)
            <tr>

              <td class="tx-14">{{$offices->parent_office_desc_b}}</td>
              <td class="tx-14">{{$offices->parent_office_desc_e}}</td>
              <td class="tx-14">{{ $offices->office_code }}</td>
              <td class="tx-14">{{ $offices->office_desc_b }}</td>
              <td class="tx-14">{{ $offices->office_desc }}</td>
              <td class="tx-14">{{ $offices->office_type_name }}</td>
              <td class="tx-14">{{ $offices->office_level_name }}</td>
              <td class="tx-14">{{ $offices->address_b }}</td>
              <td class="tx-14">{{ $offices->address }}</td>
              
              <td class="defg">
                <div class="d-flex">
                  <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editfromModal{{$offices->office_id}}"><i class="fa fa-edit"></i></button>

                  <button type="button" class="btn btn-danger btn-sm ml-2" data-toggle="modal" data-target="#deletefromModal{{$offices->office_id}}"><i class="fa fa-trash"></i></button>
                </div>
              </td>

            </tr>

<!-- Delete Modal -->
<div class="modal fade" id="deletefromModal{{$offices->office_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmation Message</h5>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this info?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="{{ Route('office.delete', $offices->office_id) }}" type="button" class="btn btn-danger">Delete</a>
      </div>
    </div>
  </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editfromModal{{$offices->office_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Information</h5>
      </div>
      <div class="modal-body">
        <form action="{{ Route('office.update',$offices->office_id) }}" method="POST">
          @csrf
          <span>Parent Office :</span>
          <input readonly value="{{$offices1->office_desc}}~{{$offices1->office_code}}" type="text" name="office_desc" id="office_desc" class="mb-3 form-control">
          
          <span>Office Code :</span>
          <input value="{{ $offices->office_code }}" type="text" name="office_code" id="office_code" class="mb-3 form-control">

          <span>Description (Bangla) :</span>
          <textarea type="text" name="office_desc_b" id="office_desc_b" class="mb-3 form-control">{{ $offices->office_desc_b }}</textarea>

          <span>Description :</span>
          <textarea name="office_desc" id="office_desc" class="mb-3 form-control">{{ $offices->office_desc }}</textarea>

          <span>Type of Office :</span>
          <select class="form-control mb-3" name="office_type" id="office_type" aria-label=".form-select-lg example">
            <option value="">---Type---</option>
            @foreach($offices2 as $type)
            <option value="{{$type->office_type}}" {{$type->office_type == $offices->office_type  ? 'selected' : ''}}>{{$type->office_type_desc}}</option>
            @endforeach
          </select>
          
          <span>Level of Office :</span>
          <select class="form-control mb-3" name="office_level_code" id="office_level_code" aria-label=".form-select-lg example">
            <option value="">---Level---</option>
            @foreach($offices3 as $level)
            <option value="{{$level->office_level_code}}" {{$level->office_level_code == $offices->office_level_code  ? 'selected' : ''}}>{{$level->office_level_desc}}</option>
            @endforeach
          </select>
          
          <span>Address (Bangla) :</span>
          <textarea name="address_b" id="address_b" class="mb-3 form-control">{{ $offices->address_b }}</textarea>

          <span>Address :</span>
          <textarea name="address" id="address" class="mb-3 form-control">{{ $offices->address }}</textarea>

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