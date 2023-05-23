
<!DOCTYPE html>
<html lang="en">
  <head>
    @include('backend.includes.header')

    @include('backend.includes.css')
  </head>

  <body>
    @include('backend.includes.leftbar')

    @include('backend.includes.topbar')

    @include('backend.includes.rightbar')

    

      <div class="br-pagebody">
       
            @yield('content')
        
      </div><!-- br-pagebody -->

      @include('backend.includes.footer')

    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    @include('backend.includes.scripts')
  </body>
</html>
