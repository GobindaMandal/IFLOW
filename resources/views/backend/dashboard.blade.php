@extends('backend.mastering.master')
    @section('content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
      <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
          <h4 class="text-center p-1" style="color:White;background-color:#1D6E6C;font-family:Century Gothic;font-size:X-Large;font-weight:bold;height:36px;width:200px;">Dashboard</h4>
          <!-- <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p> -->
        </div>
      </div>

      <div class="card bd-0 shadow-base pd-25 pd-xs-40 mg-t-20">
        <div class="card-header bg-transparent pd-0 bd-b-0">
        <div id="columnchart_material" style="width: 800px; height: 500px;"></div>
        <!-- <div id="chart_div2" style="width: 900px; height: 500px;"></div> -->

        </div>
      </div>



      <div class="card bd-0 shadow-base pd-25 pd-xs-40 mg-t-20">
        <div class="card-header bg-transparent pd-0 bd-b-0">
        <div id="piechart" style="width: 900px; height: 500px;"></div>
        <!-- <div id="chart_div2" style="width: 900px; height: 500px;"></div> -->

        </div>
      </div>

    </div>

    @endsection