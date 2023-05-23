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
          <!-- <button onclick="window.print()" style="float:right" class="btn btn-info"><i class="fa fa-print"></i></button> -->
          <button onclick="printContent('print_doc')" style="float:right" class="btn btn-info"><i class="fa fa-print"></i></button>
        </div>
      </div>
    </div>

    <div class="container pt-3" id="print_doc">
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
                        <h5 class="para">Allocation Summery</h5>
                    </div>
                </div>
         
                <div class="row mt-3">
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="border pb-5" style="width:5%; text-align: center;">ক্রমিক নং</th>
                                    <th class="border pb-5" style="width:10%; text-align: center;">ঢাকা কম্পিঊটার কেন্দ্রের নোট রিসিভ নং</th>
                                    <th class="border pb-5" style="width:10%; text-align: center;">ঢাকা কম্পিঊটার কেন্দ্রের নোট রিসিভ তারিখ</th>
                                    <th class="border pb-5" style="width:20%; text-align: center;">দপ্তরের নাম ও ঠিকানা</th> 
                                    @foreach ($dynamicColumns as $column)
                                    <th class="border" > 
                                    <div class="rotated-th">
                                        <span class="rotated-th__label">
                                        {{ ucfirst($column) }} 
                                        </span>
                                    </div>
                                    </th>
                                    @endforeach
                                </tr>
                                
                            </thead>
                            <tbody>
                                <?php $sl=1; ?>
                                @foreach ($alloc2 as $row)
                                <tr>
                                    <td class="border tx-12">{{ $sl }}</td>
                                    <td class="border tx-12">{{ $row['REC_NO'] }}</td>
                                    <td class="border tx-12">{{ $row['REC_DATE'] }}</td>
                                    <td class="border tx-12">{{ $row['OFFICE_DESC_B'] }}</td>
                                    @foreach ($dynamicColumns as $column)
                                        <td class="border tx-12">{{ $row[$column] }}</td>
                                    @endforeach
                                </tr>
                                <?php $sl++ ?>
                            @endforeach
                            </tbody>
                        </table>
                        </div>
                            
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
    table {
        border-collapse: collapse ;
    }
    tbody th {
        /* padding: 4px 15px 4px 0px ; */
        text-align: right ;
    }
    tbody td {
        border: 1px solid #cccccc ;
        /* padding: 8px 15px 8px 15px ; */
        text-align: center ;
    }

    .rotated-th {
        height: 180px ;
        position: relative ;
    }
    .rotated-th__label {
        font-size: 8px;
        bottom: 5px ;
        left: 50% ;
        position: absolute ;
        transform: rotate( -90deg ) ;
        transform-origin: center left ;
        white-space: nowrap ;
    }

</style>

</div>

@endsection