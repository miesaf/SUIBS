
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>H O M E</title>

  <link rel="stylesheet" href="/css/app.css">

  <style>
    /* Set the size of the div element that contains the map */
    #map {
      height: 400px;  /* The height is 400 pixels */
      width: 100%;  /* The width is the width of the web page */
      }
  </style>


</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
  <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
    
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <!--
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fa fa-search"></i>
          </button>
        </div>
        -->
      </div>
    </form>

    
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/home') }}" class="brand-link">
      <img src="./img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">S U I B S</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="./img/project.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">
            {{Auth::user()->name}}
          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
          </li>  
              
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                View
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/borrower" class="nav-link ">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Borrowers</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/inventory" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Inventories</p>
                </a>
              </li>
              <!--<li class="nav-item">
                <a href="/borrowInventory" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Borrow Details</p>
                </a>
              </li>-->
            </ul>
          </li>
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Add
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/borrower/create" class="nav-link ">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Borrowers</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/inventory/create" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Inventories</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
              <a href="/logout" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  Logout
                </p>
              </a>
          </li> 
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
          @yield('content')
      </div>
      <div class="container-fluid">
          @yield('map_peta')
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2018 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

  <script src="/js/app.js"></script>

  <script>
    // Initialize and add the map
    function initMap() {
      // The location of unitsukan
      
      var unitsukan = {lat: 2.225611, lng: 102.456363};
      // The map, centered at unitsukan
      var map = new google.maps.Map(
          document.getElementById('map'), {zoom: 18, center: unitsukan});
      // The marker, positioned at unitsukan
      var marker = new google.maps.Marker({position: unitsukan, map: map});
    }
  </script>
  <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAHUnUEC22uCUyWW-KCiyZ4wk8BFyXEZsM&callback=initMap">
  </script>

</body>
</html>
