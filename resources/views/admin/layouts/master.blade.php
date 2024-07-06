@include('admin.layouts.style')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  
  @include('admin.layouts.preLoader')
  <!-- Navbar -->
  @include('admin.layouts.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('admin.layouts.sidebar')

  <!-- Content Wrapper. Contains page content -->
  @yield('content')
  <!-- /.content-wrapper -->
  @include('admin.layouts.footer')

  <!-- Control Sidebar -->
  @include('admin.layouts.controlSidebar')
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@include('admin.layouts.script')