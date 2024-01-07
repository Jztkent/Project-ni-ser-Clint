<?php
require_once 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Using prepared statements to prevent SQL injection
    $qry = "SELECT id FROM admin_acc WHERE username = ? AND password = ?";
    
    $stmt = mysqli_prepare($conn, $qry);

    // Bind parameters to the prepared statement
    mysqli_stmt_bind_param($stmt, "ss", $username, $password);

    // Execute the prepared statement
    $result = mysqli_stmt_execute($stmt);

    // Check if the statement was executed successfully
    if ($result) {
        // Get the result set from the prepared statement
        $result = mysqli_stmt_get_result($stmt);

        // Check if there is a matching user
        if ($row = mysqli_fetch_assoc($result)) {
            // Store the admin ID in the session
            session_start();
            $_SESSION['admin_id'] = $row['id'];

            // Display a pop-up message
            echo "<script>alert('Login Successful!');</script>";

            // Redirect to admin profile or dashboard
            header("Location: ../view/adminaccount.php");
            exit();
        } else {
            // Login failed - Incorrect username or password
            echo "<script>alert('Login Failed: Incorrect username or password.'); window.location.href = 'login.php';</script>";
        }
    } else {
        // Error in executing the statement
        echo "<script>alert('Login Failed: Something went wrong.'); window.location.href = 'login.php';</script>";
    }

    // Close the prepared statement
    mysqli_stmt_close($stmt);
}
?>