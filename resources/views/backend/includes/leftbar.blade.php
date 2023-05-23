<!-- ########## START: LEFT PANEL ########## -->
<div class="br-logo" > <a href="{{route('dashboard')}}"><img src="{{ asset('backend') }}/img/iFlow.png" alt="" width="200px" height="70px"></a></div>
<div class="br-sideleft sideleft-scrollbar">
  <label class="sidebar-label pd-x-10 mg-t-20 op-3">Navigation</label>
  <ul class="br-sideleft-menu">
    
    <li class="br-menu-item">
      <a href="{{route('dashboard')}}" class="br-menu-link">
        <i class="menu-item-icon icon ion-ios-home-outline tx-24"></i>
        <span class="menu-item-label">Dashboard</span>
      </a><!-- br-menu-link -->
    </li><!-- br-menu-item -->
    <!-- <li class="br-menu-item">
      <a href="mailbox.html" class="br-menu-link">
        <i class="menu-item-icon icon ion-ios-email-outline tx-24"></i>
        <span class="menu-item-label">Mailbox</span>
      </a>
    </li> -->
    <!-- br-menu-item -->
    <li class="br-menu-item">
      <a href="#" class="br-menu-link with-sub show-sub">
        <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
        <span class="menu-item-label">Transaction</span>
      </a><!-- br-menu-link -->
      <ul class="br-menu-sub">
        <li class="sub-item"><a href="{{ route('purchaseorder.show') }}" class="sub-link">Purchase Order</a></li>
        <li class="sub-item"><a href="{{ route('receive.show') }}" class="sub-link">Receive</a></li>
        <li class="sub-item"><a href="{{ route('requisition.show') }}" class="sub-link">Requisition</a></li>
        <li class="sub-item"><a href="{{ route('allocation.show') }}" class="sub-link">Allocation</a></li>
        <li class="sub-item"><a href="{{ route('issue.show') }}" class="sub-link">Issue</a></li>
      </ul>
    </li>
    <li class="br-menu-item">
      <a href="#" class="br-menu-link with-sub">
        <i class="menu-item-icon icon ion-ios-filing-outline tx-24"></i>
        <span class="menu-item-label">Report</span>
      </a><!-- br-menu-link -->

      <ul class="br-menu-sub">
        <a href="#" class="br-menu-link with-sub">
          <span class="menu-item-label">Purchase Order</span>
        </a><!-- br-menu-link -->
        <ul>
          <li class="sub-item"><a href="{{ route('purchaseOrderDetails') }}" class="sub-link">Details of Purchase <br> Order</a></li>
          <li class="sub-item"><a href="{{ route('purchaseOrderSummary') }}" class="sub-link">Summary of Purchase <br> Order</a></li>
        </ul>
        <a href="#" class="br-menu-link with-sub">
          <span class="menu-item-label">Receive</span>
        </a><!-- br-menu-link -->
        <ul>
          <li class="sub-item"><a href="{{ route('receiveDetails') }}" class="sub-link">Details of Receive</a></li>
          <li class="sub-item"><a href="{{ route('receiveSummary') }}" class="sub-link">Summary of Receive</a></li>
        </ul>
        <a href="#" class="br-menu-link with-sub">
          <span class="menu-item-label">Requisition</span>
        </a><!-- br-menu-link -->
        <ul>
          <li class="sub-item"><a href="{{ route('requisitionDetails') }}" class="sub-link">Details of Requisition</a></li>
          <li class="sub-item"><a href="{{ route('requisitionSummary') }}" class="sub-link">Summary of Requisition</a></li>
        </ul>
        <a href="#" class="br-menu-link with-sub">
          <span class="menu-item-label">Allocation</span>
        </a><!-- br-menu-link -->
        <ul>
          <li class="sub-item"><a href="{{ route('allocationDetails') }}" class="sub-link">Details of Allocation</a></li>
          <li class="sub-item"><a href="{{ route('allocationSummary') }}" class="sub-link">Summary of Allocation</a></li>
        </ul>
        <a href="#" class="br-menu-link with-sub">
          <span class="menu-item-label">Issue</span>
        </a><!-- br-menu-link -->
        <ul>
          <li class="sub-item"><a href="{{ route('issueDetails') }}" class="sub-link">Details of Issue</a></li>
          <li class="sub-item"><a href="{{ route('issueSummary') }}" class="sub-link">Summary of Issue</a></li>
        </ul>

      </ul>


    <!-- <li class="br-menu-item">
      <a href="#" class="br-menu-link with-sub">
        <i class="menu-item-icon ion-ios-redo-outline tx-24"></i>
        <span class="menu-item-label">Navigation</span>
      </a>
      <ul class="br-menu-sub">
        <li class="sub-item"><a href="navigation.html" class="sub-link">Basic Nav</a></li>
        <li class="sub-item"><a href="navigation-layouts.html" class="sub-link">Nav Layouts</a></li>
        <li class="sub-item"><a href="navigation-effects.html" class="sub-link">Nav Effects</a></li>
      </ul>
    </li> -->
    <!-- br-menu-item -->
    <!-- <li class="br-menu-item">
      <a href="#" class="br-menu-link with-sub">
        <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
        <span class="menu-item-label">Charts</span>
      </a>
      <ul class="br-menu-sub">
        <li class="sub-item"><a href="chart-morris.html" class="sub-link">Morris Charts</a></li>
        <li class="sub-item"><a href="chart-flot.html" class="sub-link">Flot Charts</a></li>
        <li class="sub-item"><a href="chart-chartjs.html" class="sub-link">Chart JS</a></li>
        <li class="sub-item"><a href="chart-echarts.html" class="sub-link">ECharts</a></li>
        <li class="sub-item"><a href="chart-rickshaw.html" class="sub-link">Rickshaw</a></li>
        <li class="sub-item"><a href="chart-chartist.html" class="sub-link">Chartist</a></li>
        <li class="sub-item"><a href="chart-sparkline.html" class="sub-link">Sparkline</a></li>
        <li class="sub-item"><a href="chart-peity.html" class="sub-link">Peity</a></li>
      </ul>
    </li> -->
    <!-- br-menu-item -->
    <li class="br-menu-item">
      <a href="#" class="br-menu-link with-sub">
        <i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i>
        <span class="menu-item-label">Settings</span>
      </a><!-- br-menu-link -->
      <ul class="br-menu-sub">
        <li class="sub-item"><a href="{{ route('usercreate.add') }}" class="sub-link">User</a></li>
        <li class="sub-item"><a href="{{ route('office.treeadd') }}" class="sub-link">Office</a></li>
        <!-- <li class="sub-item"><a href="form-validation.html" class="sub-link">Bank</a></li> -->
        <li class="sub-item"><a href="{{ route('major.add') }}" class="sub-link">Item</a></li>
        <li class="sub-item"><a href="{{ route('supplier.add') }}" class="sub-link">Supplier</a></li>
      </ul>
    </li><!-- br-menu-item -->
    <!-- <li class="br-menu-item">
      <a href="#" class="br-menu-link with-sub">
        <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-20"></i>
        <span class="menu-item-label">Tables</span>
      </a>
      <ul class="br-menu-sub nav flex-column">
        <li class="sub-item"><a href="table-basic.html" class="sub-link">Basic Table</a></li>
        <li class="sub-item"><a href="table-datatable.html" class="sub-link">Data Table</a></li>
      </ul>
    </li> -->
    <!-- br-menu-item -->
    <!-- <li class="br-menu-item">
      <a href="#" class="br-menu-link with-sub">
        <i class="menu-item-icon icon ion-ios-navigate-outline tx-24"></i>
        <span class="menu-item-label">Maps</span>
      </a>
      <ul class="br-menu-sub">
        <li class="sub-item"><a href="map-google.html" class="sub-link">Google Maps</a></li>
        <li class="sub-item"><a href="map-leaflet.html" class="sub-link">Leaflet Maps</a></li>
        <li class="sub-item"><a href="map-vector.html" class="sub-link">Vector Maps</a></li>
      </ul>
    </li> -->
    <!-- br-menu-item -->
    <!-- <li class="br-menu-item">
      <a href="#" class="br-menu-link with-sub">
        <i class="menu-item-icon icon ion-ios-color-filter-outline tx-24"></i>
        <span class="menu-item-label">Skins</span>
      </a>
      <ul class="br-menu-sub">
        <li class="sub-item"><a href="skin-select2.html" class="sub-link">Select2</a></li>
        <li class="sub-item"><a href="skin-rangeslider.html" class="sub-link">Ion RangeSlider</a></li>
        <li class="sub-item"><a href="skin-input-form.html" class="sub-link">Textbox Form</a></li>
        <li class="sub-item"><a href="skin-file-browser.html" class="sub-link">File Browser</a></li>
        <li class="sub-item"><a href="skin-datepicker.html" class="sub-link">Datepicker</a></li>
        <li class="sub-item"><a href="skin-template.html" class="sub-link">Template</a></li>
      </ul>
    </li> -->
    <!-- br-menu-item -->
    <li class="br-menu-item">
      <a href="#" class="br-menu-link">
        <img src="{{ asset('backend') }}/img/ITB.jpg" alt="">
      </a><!-- br-menu-link -->
    </li>
    <!-- br-menu-item -->
    <!-- <li class="br-menu-item">
      <a href="pages.html" class="br-menu-link">
        <i class="menu-item-icon icon ion-ios-paper-outline tx-22"></i>
        <span class="menu-item-label">Apps &amp; Pages</span>
      </a>
    </li> -->
    <!-- br-menu-item -->


    <!-- <li class="br-menu-item">
      <a href="layouts.html" class="br-menu-link">
        <i class="menu-item-icon icon ion-ios-book-outline tx-22"></i>
        <span class="menu-item-label">Layouts</span>
      </a>
    </li> -->
    <!-- br-menu-item -->
    <!-- <li class="br-menu-item">
      <a href="sitemap.html" class="br-menu-link">
        <i class="menu-item-icon icon ion-ios-list-outline tx-22"></i>
        <span class="menu-item-label">Sitemap</span>
      </a>
    </li> -->
    <!-- br-menu-item -->
  </ul><!-- br-sideleft-menu -->

  <!-- <label class="sidebar-label pd-x-10 mg-t-25 mg-b-20 tx-info">Information Summary</label>

  <div class="info-list">
    

    

    <div class="info-list-item">
      <div>
        <p class="info-list-label">Disk Usage</p>
        <h5 class="info-list-amount">82.02%</h5>
      </div>
      <span class="peity-bar" data-peity='{ "fill": ["#8E4246"], "height": 35, "width": 60 }'>1,2,1,3,2,10,4,12,7</span>
    </div>
    

    
  </div> -->
  <!-- info-list -->

  <br>
</div><!-- br-sideleft -->
<!-- ########## END: LEFT PANEL ########## -->