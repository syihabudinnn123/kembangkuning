<!DOCTYPE html>
<html lang="en">
  @include('user.partials.head')
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="{{ route('homepage') }}" class="site_title"></i> <span>SIDESA</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            {{-- @include('user.partials.profile') --}}
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            @include('user.partials.sidebar')
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            {{-- <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ route('logout') }}">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div> --}}
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        @include('user.partials.topnavigation')
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">

            @yield('content')
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
    @include('user.partials.scripts')
  </body>
</html>
