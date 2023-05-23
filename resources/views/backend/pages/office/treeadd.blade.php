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
          <h5 class="text-primary tx-18 tx-spacing-1 tx-bold tx-inverse">Office</h5>

          <!-- tree view -->
          <div class="border-box ml-5">
            <h6 class="p-2">Select Office</h6>
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
                <label for="">Parent Office :</label>
                <input readonly type="text" name="" id="" class="form-control tx-14" placeholder="Enter Parent Office">
              </div><!-- form-group -->
            </div><!-- col-2 -->

            <div class="col-md-4 col-lg-4 mg-t-10 mg-lg-t-0">
              <div class="form-group mg-b-0">
                <label for="">Office Code :</label>
                <input type="number" name="" id="" class="form-control tx-14" placeholder="Enter Office Code">
              </div><!-- form-group -->
            </div><!-- col-2 -->

            <div class="col-md-4 col-lg-4 mg-t-10 mg-lg-t-0">
              <div class="form-group mg-b-0">
                <label for="">Description (Bangla) :</label>
                <textarea name="" id="" cols="30" rows="2" class="form-control tx-14" placeholder="Enter Description"></textarea>
              </div><!-- form-group -->
            </div><!-- col-2 -->

            <div class="col-md-4 col-lg-4 mg-t-10 mg-lg-t-0">
              <div class="form-group mg-b-0">
                <label for="">Description :</label>
                <textarea name="" id="" cols="30" rows="2" class="form-control tx-14" placeholder="Enter Description"></textarea>
              </div><!-- form-group -->
            </div><!-- col-2 -->

            <div class="col-md-4 col-lg-4">
              <div class="form-group mg-b-0">
                <label class="d-block">Type :</label>
                <select id="" name="" class="form-control wd-100p" data-placeholder="Choose origin">
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
                <select id="" name="" class="form-control wd-100p" data-placeholder="Choose origin">
                  <option value="">---Select Level---</option>
                  @foreach($offices3 as $level)
                  <option value="{{$level->office_level_code}}">{{$level->office_level_desc}}</option>
                  @endforeach
                </select>
              </div><!-- form-group -->
            </div><!-- col-3 -->

            <div class="col-md-4 col-lg-4 mg-t-10 mg-lg-t-0">
              <div class="form-group mg-b-0">
                <label for="">Address (Bangla) :</label>
                <textarea name="" id="" cols="30" rows="2" class="form-control tx-14" placeholder="Enter Address"></textarea>
              </div><!-- form-group -->
            </div><!-- col-2 -->

            <div class="col-md-4 col-lg-4 mg-t-10 mg-lg-t-0">
              <div class="form-group mg-b-0">
                <label for="">Address :</label>
                <textarea name="" id="" cols="30" rows="2" class="form-control tx-14" placeholder="Enter Address"></textarea>
              </div><!-- form-group -->
            </div><!-- col-2 -->

          </div><!-- row -->

          <button class="btn btn-info tx-11 tx-spacing-1 tx-semibold pd-y-12 pd-x-30 mg-t-10">Save</button>
        </div><!-- card-block -->
      </div><!-- card -->

  </form>
  
@endsection