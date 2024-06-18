<?php
require 'submit_product.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Makaan - Admin | Dashboard</title>
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../assets/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <!-- summernote -->
  <link rel="stylesheet" href="../assets/plugins/summernote/summernote-bs4.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../assets/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="./Items.php" class="nav-link">Add Items</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="./All_items.php" class="nav-link">All Items Details</a>
      </li>
    </ul>

    
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
     

     
     
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    
    </ul>
  </nav>
  <!-- /.navbar -->

   <!-- Main Sidebar Container -->
   <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../Admin_dashboard.php" class="brand-link">
      <img src="../assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../assets/dist/img/user1-128x128.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin</a>
        </div>
      </div>

   
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Admin Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./Items.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Items</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./All_items.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Items</p>
                </a>
              </li>
           
            </ul>
          </li>

         
    </div>
    <!-- /.sidebar -->
  </aside>

  
     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Items through the form Below</h1>
            <hr>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">ADD ITEMS</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- FORM -->
    <div class="row">
          <div class="col-md-12">
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">Fill in the following to upload item to  the user page
                </h3>
              </div>
              <div class="card-body p-0 " >
                <div class="bs-stepper ">
                    <!-- your steps here -->
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="container" enctype="multipart/form-data">
    <div class="form-floating my-3">
        <input type="text" class="form-control" id="floatingInput" placeholder="Title" name="title" required>
        <label for="floatingInput">Title</label>
    </div>
    <div class="form-floating my-3">
        <input type="text" class="form-control" id="floatingInput" placeholder="Location" name="location" required>
        <label for="floatingInput">Location</label>
    </div>
    <div class="form-floating my-3">
        <input type="text" class="form-control" id="floatingInput" placeholder="Price" name="price" required>
        <label for="floatingInput">Price</label>
    </div>
    <div class="mb-3">
        <label for="formFile" class="form-label">Add image</label>
        <input class="form-control" type="file" id="formFile" name="image" accept=".jpg,.jpeg,.png" required>
    </div>
    <label for="formStatus" class="form-label">Building Status</label>
    <br>
    <select class="form-select mb-3" name="building_status" required>
        <option value="For Rent">For Rent</option>
        <option value="For Sell">For Sell</option>
    </select>
    <label for="formCategory" class="form-label">Category</label>
    <br>
    <select class="form-select mb-3" name="category" required>
        <option value="Apartment">Apartment</option>
        <option value="Villa">Villa</option>
        <option value="Town House">Town House</option>
        <option value="Office">Office</option>
        <option value="Shop">Shop</option>
    </select>
    <div class="mb-3">
        <label for="formDescription" class="form-label">Description</label>
        <textarea class="form-control" id="formDescription" rows="3" placeholder="Description" name="description" required></textarea>
    </div>
    <div class="col-12">
        <button class="btn btn-primary w-100 py-3 mb-4 text-light" type="submit">Submit</button>
    </div>
    <?php
    if ($script !== '') {
        echo $script;
    }
    ?>
</form>

                   
                    <div class="line"></div>
                 
                  <div class="bs-stepper-content container">
                    <!-- your steps content here -->
                    <div id="logins-part" class="content container" role="tabpanel" aria-labelledby="logins-part-trigger">
                    
                    </div>
                 
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              <!-- <div class="card-footer">
                Visit <a href="https://github.com/Johann-S/bs-stepper/#how-to-use-it">bs-stepper documentation</a> for more examples and information about the plugin.
              </div> -->
            </div>
            <!-- /.card -->
          </div>
        </div>



  </div>

  




  
<!-- jQuery -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../assets/plugins/moment/moment.min.js"></script>
<script src="../assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../assets/dist/js/pages/dashboard.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
