<script src="{{ asset('backend') }}/lib/jquery/jquery.min.js"></script>
<script src="{{ asset('backend') }}/lib/jquery-ui/ui/widgets/datepicker.js"></script>
<script src="{{ asset('backend') }}/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('backend') }}/lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="{{ asset('backend') }}/lib/moment/min/moment.min.js"></script>
<script src="{{ asset('backend') }}/lib/peity/jquery.peity.min.js"></script>
<script src="{{ asset('backend') }}/lib/rickshaw/vendor/d3.min.js"></script>
<script src="{{ asset('backend') }}/lib/rickshaw/vendor/d3.layout.min.js"></script>
<script src="{{ asset('backend') }}/lib/rickshaw/rickshaw.min.js"></script>
<script src="{{ asset('backend') }}/lib/jquery.flot/jquery.flot.js"></script>
<script src="{{ asset('backend') }}/lib/jquery.flot/jquery.flot.resize.js"></script>
<script src="{{ asset('backend') }}/lib/flot-spline/js/jquery.flot.spline.min.js"></script>
<script src="{{ asset('backend') }}/lib/jquery-sparkline/jquery.sparkline.min.js"></script>
<script src="{{ asset('backend') }}/lib/echarts/echarts.min.js"></script>
<script src="{{ asset('backend') }}/lib/select2/js/select2.full.min.js"></script>
<script src="http://maps.google.com/maps/api/js?key=AIzaSyAq8o5-8Y5pudbJMJtDFzb8aHiWJufa5fg"></script>
<script src="{{ asset('backend') }}/lib/gmaps/gmaps.min.js"></script>

<script src="{{ asset('backend') }}/js/bracket.js"></script>
<script src="{{ asset('backend') }}/js/map.shiftworker.js"></script>
<script src="{{ asset('backend') }}/js/ResizeSensor.js"></script>
<script src="{{ asset('backend') }}/js/dashboard.js"></script>
<script src="{{ asset('backend') }}/js/myjs.js"></script>

<!-- data table -->
<script src="//cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>

<!-- toastr -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>



<script>
  $(function(){
    'use strict'

    // FOR DEMO ONLY
    // menu collapsed by default during first page load or refresh with screen
    // having a size between 992px and 1299px. This is intended on this page only
    // for better viewing of widgets demo.
    $(window).resize(function(){
      minimizeMenu();
    });

    minimizeMenu();

    function minimizeMenu() {
      if(window.matchMedia('(min-width: 992px)').matches && window.matchMedia('(max-width: 1299px)').matches) {
        // show only the icons and hide left menu label by default
        $('.menu-item-label,.menu-item-arrow').addClass('op-lg-0-force d-lg-none');
        $('body').addClass('collapsed-menu');
        $('.show-sub + .br-menu-sub').slideUp();
      } else if(window.matchMedia('(min-width: 1300px)').matches && !$('body').hasClass('collapsed-menu')) {
        $('.menu-item-label,.menu-item-arrow').removeClass('op-lg-0-force d-lg-none');
        $('body').removeClass('collapsed-menu');
        $('.show-sub + .br-menu-sub').slideDown();
      }
    }
  });
</script>

<!-- data table -->
<script>
  let table = new DataTable('#datatable');
</script>


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<!-- line chart start  -->
<script type="text/javascript">
  google.charts.load('current', {'packages':['bar']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Year', 'Sales', 'Expenses', 'Profit'],
      ['2014', 1000, 400, 200],
      ['2015', 1170, 460, 250],
      ['2016', 660, 1120, 300],
      ['2017', 1030, 540, 350]
    ]);

    var options = {
      chart: {
        title: 'Company Performance',
        subtitle: 'Sales, Expenses, and Profit: 2014-2017',
      }
    };

    var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

    chart.draw(data, google.charts.Bar.convertOptions(options));
  }
</script>

<!-- line chart start  -->



<!-- pie chart start  -->
<!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> -->
<script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {

    var data = google.visualization.arrayToDataTable([
      ['Task', 'Hours per Day'],
      ['Work',     11],
      ['Eat',      2],
      ['Commute',  2],
      ['Watch TV', 2],
      ['Sleep',    7]
    ]);

    var options = {
      title: 'My Daily Activities'
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart'));

    chart.draw(data, options);
  }
</script>

<!-- pie chart end  -->


<!-- purchase order -->
<script>
  function calc() {
    var p_QNTY = document.getElementById("p_QNTY").value;
    var p_QNTY = parseInt(p_QNTY);
    var p_RATE = document.getElementById("p_RATE").value;
    var p_RATE = parseInt(p_RATE);
    var p_AMOUNT = p_QNTY * p_RATE;
    document.getElementById("p_AMOUNT").value = p_AMOUNT;
  }

  function calc3(po_dtl_id) {
    var qnty = document.getElementById("qnty" + po_dtl_id).value;
    var qnty = parseInt(qnty);
    var rate = document.getElementById("rate" + po_dtl_id).value;
    var rate = parseInt(rate);
    var amount = qnty * rate;
    document.getElementById("amount" + po_dtl_id).value = amount;
}
</script>

<!-- receive -->
<script>
  const p_PO_QNTY = document.getElementById('p_PO_QNTY');
  const p_QUANTITY_RECEIVED = document.getElementById('p_QUANTITY_RECEIVED');

  p_QUANTITY_RECEIVED.addEventListener('input', () => {
      if (parseInt(p_QUANTITY_RECEIVED.value) > parseInt(p_PO_QNTY.value)) {
          p_QUANTITY_RECEIVED.value = null;
      }
  });
  function calc1() {
    var p_PO_QNTY = document.getElementById("p_PO_QNTY").value;
    var p_PO_QNTY = parseInt(p_PO_QNTY);
    var p_QUANTITY_RECEIVED = document.getElementById("p_QUANTITY_RECEIVED").value;
    var p_QUANTITY_RECEIVED = parseInt(p_QUANTITY_RECEIVED);
    var p_QUANTITY_ACCEPTED = document.getElementById("p_QUANTITY_ACCEPTED").value;
    var p_QUANTITY_ACCEPTED = parseInt(p_QUANTITY_ACCEPTED);
    var p_rate = document.getElementById("p_rate").value;
    var p_rate = parseInt(p_rate);

    if (p_QUANTITY_ACCEPTED <= p_QUANTITY_RECEIVED) {
        var p_QUANTITY_DISPUTED = p_QUANTITY_RECEIVED - p_QUANTITY_ACCEPTED;
        var p_AMOUNT_ACCEPTED = p_QUANTITY_ACCEPTED * p_rate;
        document.getElementById("p_QUANTITY_DISPUTED").value = p_QUANTITY_DISPUTED;
        document.getElementById("p_AMOUNT_ACCEPTED").value = p_AMOUNT_ACCEPTED;
    } else {
        alert("Accepted quantity can't be greater than received quantity.");
        document.getElementById("p_QUANTITY_ACCEPTED").value = '';
        document.getElementById("p_QUANTITY_DISPUTED").value = '';
        document.getElementById("p_AMOUNT_ACCEPTED").value = '';
    }
  }
  function checkQuantityReceived(input, poQnty) {
    if (input.value > poQnty) {
      input.value = null;
    }
  }
  function calc4(ri_dtl_id) {
    var po_qnty = document.getElementById("po_qnty" + ri_dtl_id).value;
    var po_qnty = parseInt(po_qnty);
    var quantity_received = document.getElementById("quantity_received" + ri_dtl_id).value;
    var quantity_received = parseInt(quantity_received);
    var quantity_accepted = document.getElementById("quantity_accepted" + ri_dtl_id).value;
    var quantity_accepted = parseInt(quantity_accepted);
    var rate = document.getElementById("rate" + ri_dtl_id).value;
    var rate = parseInt(rate);

    if (quantity_accepted <= quantity_received) {
        var quantity_disputed = quantity_received - quantity_accepted;
        var amount_accepted = quantity_accepted * rate;
        document.getElementById("quantity_disputed" + ri_dtl_id).value = quantity_disputed;
        document.getElementById("amount_accepted" + ri_dtl_id).value = amount_accepted;
    } else {
        alert("Accepted quantity can't be greater than received quantity." + ri_dtl_id);
        document.getElementById("quantity_accepted" + ri_dtl_id).value = '';
        document.getElementById("quantity_disputed" + ri_dtl_id).value = '';
        document.getElementById("amount_accepted" + ri_dtl_id).value = '';
    }
  }
</script>

<!-- allocation -->
<script>
  const qnty = document.getElementById('qnty');
  const p_QUANTITY_ALLOCATED = document.getElementById('p_QUANTITY_ALLOCATED');

  p_QUANTITY_ALLOCATED.addEventListener('input', () => {
      if (parseInt(p_QUANTITY_ALLOCATED.value) > parseInt(qnty.value)) {
          p_QUANTITY_ALLOCATED.value = null;
      }
  });
  
  function calc2() {
    var qnty = document.getElementById("qnty").value;
    var qnty = parseInt(qnty);
    var p_QUANTITY_ALLOCATED = document.getElementById("p_QUANTITY_ALLOCATED").value;
    var p_QUANTITY_ALLOCATED = parseInt(p_QUANTITY_ALLOCATED);

    if(p_QUANTITY_ALLOCATED>qnty){
      var p_QUANTITY_UNALLOCATED = 0;
      document.getElementById("p_QUANTITY_UNALLOCATED").value = p_QUANTITY_UNALLOCATED;
    }else{
      var p_QUANTITY_UNALLOCATED = qnty - p_QUANTITY_ALLOCATED;
      document.getElementById("p_QUANTITY_UNALLOCATED").value = p_QUANTITY_UNALLOCATED;
    }
  }

  function calc5(alloc_dtl_id) {
    var req_qnty = document.getElementById("req_qnty" + alloc_dtl_id).value;
    var req_qnty = parseInt(req_qnty);
    var alloc_qnty = document.getElementById("alloc_qnty" + alloc_dtl_id).value;
    var alloc_qnty = parseInt(alloc_qnty);

    if(alloc_qnty>req_qnty){
      var unallocated_quantity = 0;
      document.getElementById("unallocated_quantity" + alloc_dtl_id).value = unallocated_quantity;
    }else{
      var unallocated_quantity = req_qnty - alloc_qnty;
      document.getElementById("unallocated_quantity" + alloc_dtl_id).value = unallocated_quantity;
    }

    var unallocated_quantity = parseInt(req_qnty) - parseInt(alloc_qnty);
    document.getElementById('unallocated_quantity' + alloc_dtl_id).value = unallocated_quantity;

    if (parseInt(alloc_qnty) > parseInt(req_qnty)) {
    document.getElementById('alloc_qnty' + alloc_dtl_id).value = null;
  }
  }
</script>

<!-- toastr -->
<script>
  @if(Session::has('message'))
  toastr.options =
  {
    "closeButton" : true,
    "progressBar" : true
  }
        toastr.success("{{ session('message') }}");
  @endif

  @if(Session::has('error'))
  toastr.options =
  {
    "closeButton" : true,
    "progressBar" : true
  }
        toastr.error("{{ session('error') }}");
  @endif

  @if(Session::has('info'))
  toastr.options =
  {
    "closeButton" : true,
    "progressBar" : true
  }
        toastr.info("{{ session('info') }}");
  @endif

  @if(Session::has('warning'))
  toastr.options =
  {
    "closeButton" : true,
    "progressBar" : true
  }
        toastr.warning("{{ session('warning') }}");
  @endif
</script>

<!-- print div scripts starts -->
<script type="text/javascript">
  function printContent(el) {
    var divToPrint = document.getElementById(el);

    var newWin = window.open('', 'Print-Window');

    newWin.document.open();

    newWin.document.write('<html> <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">');
    newWin.document.write('<style>table {border-collapse: collapse ;}tbody th {text-align: right ;}tbody td {border: 1px solid #cccccc ;text-align: center ;}.rotated-th {height: 180px ;position: relative ;}.rotated-th__label {font-size: 10px;bottom: 5px ;left: 50% ;position: absolute ;transform: rotate( -90deg ) ; transform-origin: center left ;white-space: nowrap ;}</style>');
    newWin.document.write('<body onload="window.print()"> ');

    newWin.document.write(divToPrint.innerHTML);

    newWin.document.write('</body></html>');

    newWin.document.close();

    setTimeout(function() {
        newWin.close();
    }, 1000);
  }
</script>
<!-- print div script ends -->



