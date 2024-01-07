<?php
require_once 'database.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $mysql = "INSERT INTO admin_acc (username, password) VALUES
('$username', '$password')";

    if ($conn->query($mysql) === TRUE) {
        session_start();
        $_SESSION['registration_success'] = true;
        header('location: login.php');
        exit();
    } else {
        echo "Error " . $conn->error;
        header('location: regiter.php?error=login_failed');
    }





  
}




?>












