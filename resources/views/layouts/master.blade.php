@include('layouts.header')
<!----Head ------>

@include('layouts.title')



<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->


  @include('layouts.navbar')

  <!-- /.navbar -->



  <!-- Main Sidebar Container -->
  @include('layouts.sidebar')


  <div class="content-wrapper">


  @yield('content')


     </div>



  <!-- Footer -->


  @include('layouts.footer')
