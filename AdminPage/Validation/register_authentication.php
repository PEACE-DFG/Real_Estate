<?php
// Start the session
session_start();

// Include the database connection file
include_once dirname(__DIR__, 2) . '/Database/database.php';
// Include PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form data and apply htmlspecialchars to prevent XSS attacks
    $username = htmlspecialchars(trim($_POST['username']));
    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars($_POST['password']);
    $repeat_password = htmlspecialchars($_POST['repeat_password']);

    // Input validation
    if (empty($username) || empty($email) || empty($password) || empty($repeat_password)) {
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Please fill in all fields.'
            });
        </script>";
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Invalid email format.'
            });
        </script>";
        exit();
    }

    if ($password !== $repeat_password) {
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Passwords do not match.'
            });
        </script>";
        exit();
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Generate a 4-digit random code
    $code = random_int(1000, 9999);

    try {
        // Prepare an SQL statement
        $stmt = $pdo->prepare('INSERT INTO admin_users (username, email, password, code) VALUES (:username, :email, :password, :code)');

        // Bind the parameters
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $hashed_password, PDO::PARAM_STR);
        $stmt->bindParam(':code', $code, PDO::PARAM_INT);

        // Execute the statement
        $stmt->execute();

        // Send verification code to email
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = 0;                                       // Disable verbose debug output
            $mail->isSMTP();                                            // Set mailer to use SMTP
            $mail->Host       = 'smtp.gmail.com';                     // Specify main and backup SMTP servers
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'awofesobipeace@gmail.com';               // SMTP username
            $mail->Password   = 'gbnmkwehbmzlzlth';                  // SMTP password
            $mail->SMTPSecure = 'ssl';         // Enable TLS encryption, `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $mail->Port       = 465;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('awofesobipeace@gmail.com', 'Makaan Real Estate');
            $mail->addAddress($email, $username);                       // Add a recipient

            // Content
            $mail->isHTML(true);                                        // Set email format to HTML
            $mail->Subject = 'Verification Code';
            $mail->Body    = "Your verification code is: $code";
            $mail->AltBody = "Your verification code is: $code";

            $mail->send();
            echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Registration successful! Verification code sent to your email.',
                    didClose: () => {
                        window.location.href = '" . dirname($_SERVER['PHP_SELF'], 2) . "/AdminPage/Admin_login.php';
                    }
                });
            </script>";
        } catch (Exception $e) {
            echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Message could not be sent. Mailer Error: {$mail->ErrorInfo}'
                });
            </script>";
        }
    } catch (PDOException $e) {
        // Handle duplicate entry error (email already exists)
        if ($e->getCode() == 23000) {
            echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Email or Username  already registered. Try another one'
                });
            </script>";
        } else {
            echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Error: " . $e->getMessage() . "'
                });
            </script>";
        }
    }
}
?>
