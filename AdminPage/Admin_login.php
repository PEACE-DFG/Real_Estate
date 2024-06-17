<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Makaaan - Admin_login</title>
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

</head>
<body>
  
<!-- All content -->
<?php
require "../Database/database.php";

$errors = ""; // Initialize the error message variable

if (isset($_POST['login'])) {
    $email = $_POST['email'] ?? null;
    $password = $_POST['password'] ?? null;
    $code = $_POST['code'] ?? null; // Replace 'code' with the actual name attribute of your code input field


    if (empty($email)) {
        $errors = "Your email is required";
    }

    if (empty($password)) {
        $errors = "Your password is required";
    }

    if (empty($errors)) {
       $sql = "SELECT email, password, code FROM admin_users WHERE email = :email";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();



        if ($stmt->rowCount() > 0) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $verifiedPassword = password_verify($password, $result['password']);
            $verifiedCode =  ($code === $result['code']);

            if ($verifiedPassword && $verifiedCode) {
                $_SESSION['email'] = $result['email'];
                echo '
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script>
                    Swal.fire({
                        title: "Login successful",
                        text: "Welcome Admin",
                        icon: "success",
                        confirmButtonText: "OK"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "Dashboard/Admin_dashboard.php";
                        }
                    });
                </script>';
                
            } else {
                // Handle incorrect password
                echo '
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script>
                        Swal.fire({
                            title: "Invalid Details",
                            text: "Confirm Your login details. Check Your Email For verification of your ID Code or Re-Enter Your Password",
                            icon: "error",
                            confirmButtonText: "OK"
                        });  
                    </script>';
            }
        } else {
            // Handle email not found
            echo '            
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                    Swal.fire({
                        title: "Invalid Email",
                        text: "The email entered is not found in our records",
                        icon: "error",
                        confirmButtonText: "OK"
                    });
                </script>';
        }
    }
}
?>

 



    <?php if (!empty($errors)) : ?>
    <div class="alert alert-danger" style='color:red;text-align:center;margin:auto;padding-left:50px' role="alert">
      <?php echo $errors; ?>
    </div>
    <?php endif; ?>

    <section class="all">
      <div class=" text-center mb-2">
        <img src="https://icon-library.com/images/admin-login-icon/admin-login-icon-15.jpg" class="img-fluid w-25" alt="">
      </div>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
               <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput" placeholder="Email" name="email">
                <label for="floatingInput">Email</label>
              </div>

              <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                <label for="floatingPassword">Password</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingPassword" placeholder="ID Code" name="code">
                <label for="floatingPassword"> ID Code</label>
              </div>
              <div class="col-12">
                <button class="btn btn-primary w-100 py-3 text-light" type="submit" name="login">Login</button>
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