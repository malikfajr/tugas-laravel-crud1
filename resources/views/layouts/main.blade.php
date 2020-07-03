<!DOCTYPE html>
<html>
  <head>
    @include('layouts.partials.head')
    @stack('stylesheet')
  </head>
  <body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
      <!-- Navbar -->
      @include('layouts.partials.navbar')
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
      @include('layouts.partials.sidebar')
      <!-- Content Wrapper. Contains page content -->

      <div class="content-wrapper">
        @yield('content')
      </div>
      <!-- /.content-wrapper -->

      <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
          <b>Version</b> 3.0.5
        </div>
        <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
        reserved.
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    @include('layouts.partials.script')
    @stack('script')
  </body>
</html>
