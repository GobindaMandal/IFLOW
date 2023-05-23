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
                    <h5 style="float: left;" class="text-primary tx-18 tx-spacing-1 tx-bold tx-inverse">Allocation List</h5>
                    <a style="float: right;" href="{{route('allocation.add')}}" class="btn btn-info tx-11 tx-spacing-1 tx-semibold pd-y-12 pd-x-30">New</a>
                </div>
            </div>

            <div class="col-md-12 col-lg-12 mg-t-10 mg-lg-t-0" style="margin-top:20px">
                
                <table id="datatable" class="table table-striped table-sm" style="width:100%">
                    <thead>
                        <tr>
                            <th>System Allocation No</th>
                            <th>Allocation Reference No</th>
                            <th>Date</th>
                            <th>System Po No</th>
                            <th>Pur No</th>
                            <th>Pur Date</th>
                            <th>Remarks</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($alloc as $alloc)
                        <tr>
                            <td><a class="text-secondary" href="{{ route('allocation.edit',$alloc->alloc_no) }}">{{ $alloc->alloc_no }}</a></td>
                            <td><a class="text-secondary" href="{{ route('allocation.edit',$alloc->alloc_no) }}">{{ $alloc->ref_no }}</a></td>
                            <td><a class="text-secondary" href="{{ route('allocation.edit',$alloc->alloc_no) }}">{{ $alloc->alloc_date }}</a></td>
                            <td><a class="text-secondary" href="{{ route('allocation.edit',$alloc->alloc_no) }}">{{ $alloc->po_no }}</a></td>
                            <td><a class="text-secondary" href="{{ route('allocation.edit',$alloc->alloc_no) }}">{{ $alloc->po_ref_no }}</a></td>
                            <td><a class="text-secondary" href="{{ route('allocation.edit',$alloc->alloc_no) }}">{{ $alloc->po_date }}</a></td>
                            <td><a class="text-secondary" href="{{ route('allocation.edit',$alloc->alloc_no) }}">{{ $alloc->remarks }}</a></td>
                            
                        </tr>
                        
                    @endforeach    
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>System Allocation No</th>
                            <th>Allocation Reference No</th>
                            <th>Date</th>
                            <th>System Po No</th>
                            <th>Pur No</th>
                            <th>Pur Date</th>
                            <th>Remarks</th>
                            
                        </tr>
                    </tfoot>
                </table>


            </div>

    </div><!-- row -->

    </div><!-- card-block -->
</div><!-- card -->
@endsection