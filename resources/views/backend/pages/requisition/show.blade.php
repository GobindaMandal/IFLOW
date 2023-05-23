@extends('backend.mastering.master')
@section('content')
<!-- ########## START: MAIN PANEL ########## -->
<div class="br-mainpanel">
    <div class="br-pagetitle">
    <div>
        <h4 class="text-center p-1" style="color:White;background-color:#1D6E6C;font-family:Century Gothic;font-size:X-Large;font-weight:bold;height:36px;width:300px;">IT Inventory System</h4>
    </div>
    </div>


    <div class="card bd-0 shadow-base pd-25 pd-xs-40 mg-t-20">
    <div class="card-block pd-0">
        <div class="row row-sm">
            <div class="col-md-12 col-lg-12 mg-t-10 mg-lg-t-0">
                <div>
                    <h5 style="float: left;" class="text-primary tx-18 tx-spacing-1 tx-bold tx-inverse">Requisition Item List</h5>
                    <a style="float: right;" href="{{route('requisition.add')}}" class="btn btn-info tx-11 tx-spacing-1 tx-semibold pd-y-12 pd-x-30">New</a>
                </div>
            </div>

            <div class="col-md-12 col-lg-12 mg-t-10 mg-lg-t-0" style="margin-top:20px">
                
                <table id="datatable" class="table table-striped table-sm" style="width:100%">
                    <thead>
                        <tr>
                            <th>Requisition No</th>
                            <th>Requisition Date</th>
                            <th>Reference No</th>
                            <th>Office Name</th>
                            <th>Office Description</th>
                            <th>Remarks</th>
                            <th>Receive No</th>
                            <th>Receive Date</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($requisition as $requisitions)
                        <tr>
                            <td><a class="text-secondary" href="{{ Route('requisition.edit', $requisitions['REQ_NO']) }}">{{ $requisitions['REQ_NO'] }}</a></td>
                            <td><a class="text-secondary" href="{{ Route('requisition.edit', $requisitions['REQ_NO']) }}">{{ $requisitions['REQ_DATE'] }}</a></td>
                            <td><a class="text-secondary" href="{{ Route('requisition.edit', $requisitions['REQ_NO']) }}">{{ $requisitions['REF_NO'] }}</a></td>
                            <td><a class="text-secondary" href="{{ Route('requisition.edit', $requisitions['REQ_NO']) }}">{{ $requisitions['OFFICE_NAME'] }}</a></td>
                            <td></td>
                            <td><a class="text-secondary" href="{{ Route('requisition.edit', $requisitions['REQ_NO']) }}">{{ $requisitions['REMARKS'] }}</a></td>
                            <td><a class="text-secondary" href="{{ Route('requisition.edit', $requisitions['REQ_NO']) }}">{{ $requisitions['REC_NO'] }}</a></td>
                            <td><a class="text-secondary" href="{{ Route('requisition.edit', $requisitions['REQ_NO']) }}">{{ $requisitions['REC_DATE'] }}</a></td>
                            
                        </tr>
                        @endforeach
                        
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Requisition No</th>
                            <th>Requisition Date</th>
                            <th>Reference No</th>
                            <th>Office Name</th>
                            <th>Office Description</th>
                            <th>Remarks</th>
                            <th>Receive No</th>
                            <th>Receive Date</th>
                        </tr>
                    </tfoot>
                </table>


            </div>




    </div><!-- row -->

    </div><!-- card-block -->
</div><!-- card -->
@endsection