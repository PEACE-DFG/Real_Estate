<?php
session_start();
include_once dirname(__DIR__, 3) . '/Database/database.php';

$script = ''; // Initialize an empty script variable

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = htmlspecialchars(trim($_POST['title']));
    $location = htmlspecialchars(trim($_POST['location']));
    $price = htmlspecialchars(trim($_POST['price']));
    $building_status = htmlspecialchars(trim($_POST['building_status']));
    $category = htmlspecialchars(trim($_POST['category']));
    $description = htmlspecialchars(trim($_POST['description']));

    // Handle file upload
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Validate file upload
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check === false) {
        $script = "
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'File is not an image.'
            }).then(() => {
                window.history.back();
            });
        </script>";
    } elseif (!in_array($imageFileType, ['jpg', 'jpeg', 'png'])) {
        $script = "
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Sorry, only JPG, JPEG, and PNG files are allowed.'
            }).then(() => {
                window.history.back();
            });
        </script>";
    } elseif (!move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $script = "
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Sorry, there was an error uploading your file.'
            }).then(() => {
                window.history.back();
            });
        </script>";
    } else {
        try {
            // Prepare an SQL statement
            $stmt = $pdo->prepare('INSERT INTO products (title, location, price, image, building_status, category, description) VALUES (:title, :location, :price, :image, :building_status, :category, :description)');

            // Bind the parameters
            $stmt->bindParam(':title', $title, PDO::PARAM_STR);
            $stmt->bindParam(':location', $location, PDO::PARAM_STR);
            $stmt->bindParam(':price', $price, PDO::PARAM_STR);
            $stmt->bindParam(':image', $target_file, PDO::PARAM_STR);
            $stmt->bindParam(':building_status', $building_status, PDO::PARAM_STR);
            $stmt->bindParam(':category', $category, PDO::PARAM_STR);
            $stmt->bindParam(':description', $description, PDO::PARAM_STR);

            // Execute the statement
            $stmt->execute();

            $script = "
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Product added successfully!'
                }).then(() => {
                    window.location.href = 'All_items.php';
                });
            </script>";
        } catch (PDOException $e) {
            $script = "
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Error: " . addslashes($e->getMessage()) . "'
                }).then(() => {
                    window.history.back();
                });
            </script>";
        }
    }
}
?>
