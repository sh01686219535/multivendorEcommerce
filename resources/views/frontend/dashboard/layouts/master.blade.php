@include('frontend.dashboard.layouts.style')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  
  @include('frontend.dashboard.layouts.preLoader')
  <!-- Navbar -->
  @include('frontend.dashboard.layouts.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('frontend.dashboard.layouts.sidebar')
  <!-- Content Wrapper. Contains page content -->
  @yield('content')
  <!-- /.content-wrapper -->
  @include('frontend.dashboard.layouts.footer')

  <!-- Control Sidebar -->
  @include('frontend.dashboard.layouts.controlSidebar')
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@include('frontend.dashboard.layouts.script')