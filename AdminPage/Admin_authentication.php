

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Makaaan - Admin_registeration</title>
    <!-- Favicon -->
    <link href="../assets/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../assets/lib/animate/animate.min.css" rel="stylesheet">
    <link href="../assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">

     <!-- Include SweetAlert2 -->
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>
  
<!-- All content -->
    <section class="all">
      <div class=" text-center mb-2">
        <img src="https://www.shareicon.net/data/256x256/2016/04/14/492851_admin_256x256.png" class="img-fluid w-25" alt="">
      </div>
      <?php
        include_once 'Validation/register_authentication.php'
      ?>
      <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
        <label for="username">Username</label>
    </div>
    <div class="form-floating mb-3">
        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
        <label for="email">Email address</label>
    </div>
    <div class="form-floating mb-3">
        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
        <label for="password">Password</label>
    </div>
    <div class="form-floating mb-3">
        <input type="password" class="form-control" id="repeat_password" name="repeat_password" placeholder="Repeat Password" required>
        <label for="repeat_password">Repeat Password</label>
    </div>
    <div class="col-12">
        <button class="btn btn-primary w-100 py-3 text-light" type="submit">Register</button>
    </div>
</form>


    </section>

<!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/lib/wow/wow.min.js"></script>
    <script src="../assets/lib/easing/easing.min.js"></script>
    <script src="../assets/lib/waypoints/waypoints.min.js"></script>
    <script src="../assets/lib/owlcarousel/owl.carousel.min.js"></script>
   

</body>
</html>