@extends('backend.mastering.master')
@section('content')
<div class="br-mainpanel">
  <div class="pt-4 pl-4">
    <div class="row">
      <div class="col-md-6 col-lg-6 col-xl-6 col-sm-12">
        <h4 class="text-center p-1" style="color:White;background-color:#1D6E6C;font-family:Century Gothic;font-size:X-Large;font-weight:bold;height:36px;width:300px;">IT Inventory System</h4>
      </div>
    </div>
  </div>

  <form action="{{ Route('showrequisitionDetails') }}" method="POST">
    @csrf
    <div class="container pt-3">
        <div class="row row-sm">

            <div class="col-md-3 col-lg-3 mg-t-10 mg-lg-t-0">
                <div class="form-group mg-b-0">
                <label for="req_no">REQ No :</label>
                <input type="number" name="req_no" id="req_no" class="form-control tx-14" placeholder="Enter Requisition No">
                </div><!-- form-group -->
            </div><!-- col-2 -->

            <div class="col-md-3 col-lg-3 mg-t-10 mg-lg-t-0">
                <div class="form-group mg-b-0">
                <label for="from_date">From Date :</label>
                <input type="date" name="from_date" id="from_date" class="form-control tx-14">
                </div><!-- form-group -->
            </div><!-- col-2 -->

            <div class="col-md-3 col-lg-3 mg-t-10 mg-lg-t-0">
                <div class="form-group mg-b-0">
                <label for="to_date">To Date :</label>
                <input type="date" name="to_date" id="to_date" class="form-control tx-14">
                </div><!-- form-group -->
            </div><!-- col-2 -->

            <div class="col-md-3 col-lg-3 mg-t-50 mg-lg-t-0">
                <div class="form-group mg-b-0">
                    <button class="btn btn-success tx-11 tx-spacing-1 tx-semibold pd-y-12 pd-x-30 mg-t-35">Show</button>
                </div><!-- form-group -->
            </div><!-- col-2 -->

        </div><!-- row -->

    </div><!-- card-block -->
  </form>

    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-2">
                        <div class="text-center">
                            <img src="{{ asset('backend') }}/img/BPDB.jpeg" class="img-fluid" width="70" height="50" alt="">
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8 col-8">
                        <div class="div2 text-center">
                            <h3>Bangladesh Power Development Board (BPDB)</h3>
                            <h5>WAPDA Building (4th Floor), Motijheel C/A, Dhaka-1000</h5>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-2 ">
                        <div class="text-center">
                            <img src="{{ asset('backend') }}/img/iFlow.png" class="img-fluid" width="400" height="50" alt="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12 text-center">
                        <h5 class="para">Purchase Order Details</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-2">
                        <h6>REQ No :</h6>
                        <h6>REQ Date :</h6>
                        <h6>Remarks :</h6>
                    </div>
                    <div class="col-lg-4 col-md-4 col-4">
                        @foreach($report as $report)
                        <h6>{{ $report->req_no }}</h6>
                        <h6>{{ $report->req_date }}</h6>
                        <h6>{{ $report->remarks }}</h6>
                        @endforeach
                    </div>
                    <div class="col-lg-2 col-md-2 col-2">
                        <h6>Office Code :</h6>
                        <h6>Office Name :</h6>
                    </div>
                    <div class="col-lg-4 col-md-4 col-4 ">
                        <h6>{{ $report->office_code }}</h6>
                        <h6>{{ $report->office_desc }}</h6>
                    </div>
                    
                </div>
                <div class="row mt-3">
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="border">Item Code</th>
                                    <th class="border">Item Name</th>
                                    <th class="border">Quantity</th>
                                    <th class="border">Unit</th>
                                    <th class="border">Rate</th>
                                    <th class="border">Amount (BDT)</th>
                                    <th class="border">Remarks</th>
                                </tr>
                                
                            </thead>
                            <tbody>
                                @foreach($report1 as $details)
                                <tr>
                                    <td class="border">{{ $details->item_code }}</td>
                                    <td class="border">{{ $details->item_name }}</td>
                                    <td class="border">{{ $details->qnty }}</td>
                                    <td class="border">{{ $details->msr_name }}</td>
                                    <td class="border">{{ $details->rate }}</td>
                                    <td class="border">{{ $details->amount }}</td>
                                    <td class="border">{{ $details->remarks }}</td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                            <tfoot >
                                <tr class="tfooter">
                                    <th class="border-start"></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th class="text-center border">Total :</th>
                                    <th class="border"></th>
                                    <th class="border-end"></th>
                                </tr>
                            </tfoot>
                            
                          </table>
                        </div>
                          <h6>In Words:</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

<style>
    .para{
        display: inline-block;
        border-bottom: 2px solid black;
        color: black;
    }
    
    .inline1{
        display: inline;
    }
    .inline{
        display: inline;
    }
</style>
@endsection