@include('vendor.dashboard.layouts.style')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  
  @include('vendor.dashboard.layouts.preLoader')
  <!-- Navbar -->
  @include('vendor.dashboard.layouts.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('vendor.dashboard.layouts.sidebar')

  <!-- Content Wrapper. Contains page content -->
  @yield('content')
  <!-- /.content-wrapper -->
  @include('vendor.dashboard.layouts.footer')

  <!-- Control Sidebar -->
  @include('vendor.dashboard.layouts.controlSidebar')
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@include('vendor.dashboard.layouts.script')