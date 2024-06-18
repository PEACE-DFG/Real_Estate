<?php
session_start();
include_once dirname(__DIR__, 3) . '/Database/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['delete'])) {
        $id = intval($_POST['id']);
        $stmt = $pdo->prepare('DELETE FROM product WHERE id = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Deleted',
                text: 'Product deleted successfully!',
                didClose: () => {
                    window.location.href = 'display_products.php';
                }
            });
        </script>";
    } elseif (isset($_POST['mark_sold'])) {
        $id = intval($_POST['id']);
        $stmt = $pdo->prepare('UPDATE product SET building_status = "Sold" WHERE id = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Updated',
                text: 'Product marked as sold!',
                didClose: () => {
                    window.location.href = 'display_products.php';
                }
            });
        </script>";
    }
}

// Fetch all products
$stmt = $pdo->query('SELECT * FROM product');
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <!-- summernote -->
  <link rel="stylesheet" href="../assets/plugins/summernote/summernote-bs4.min.css">

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">


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
      <!-- <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li> -->

     
     
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
                <a href="./Items.php" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Items</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./All_items.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Items</p>
                </a>
              </li>
           
            </ul>
          </li>

         
    </div>
    <!-- /.sidebar -->
  </aside>

  <div class="container mt-5">
        <h1>Admin Panel</h1>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr style="text-align:center">
                        <th>Title</th>
                        <th>Location</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Building Status</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $product): ?>
                    <tr style="text-align:center">
                        <td><?php echo htmlspecialchars($product['title']); ?></td>
                        <td><?php echo htmlspecialchars($product['location']); ?></td>
                        <td><?php echo htmlspecialchars($product['price']); ?></td>
                        <td><img src="<?php echo htmlspecialchars($product['image']); ?>" width="100" alt="Product Image"></td>
                        <td><?php echo htmlspecialchars($product['building_status']); ?></td>
                        <td><?php echo htmlspecialchars($product['category']); ?></td>
                        <td><?php echo htmlspecialchars($product['description']); ?></td>
                        <td style="text-align:center">
                            <form action="" method="post" style="display:inline;">
                                <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                                <button type="submit" name="delete" class="btn btn-danger my-2" style="font-size:15px">Delete</button>
                            </form>
                            <form action="" method="post" style="display:inline;">
                                <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                                <button type="submit" name="mark_sold" class="btn btn-success" style="font-size:13px">Mark as Sold</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
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
</body>
</html>
