<?php
require_once 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['id'];
    $password = $_POST['dateofbirth'];

    // Validate and sanitize user input
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    // Using prepared statements to prevent SQL injection
    $qry = "SELECT id, firstname, lastname, middlename, course, institute FROM students WHERE id = ? AND dateofbirth = ?";
    
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
            // Login successful
            session_start();
            $_SESSION['student_id'] = $row['id'];

            // Redirect to the profile page
            header("location: ../student/profile.php");
            exit();
        } else {
            // Login failed - Incorrect username or password
            echo "<script>alert('Login Failed: Incorrect username or password.'); window.location.href = 'login.student.php';</script>";
        }
    } else {
        // Error in executing the statement
        echo "<script>alert('Login Failed: Something went wrong.'); window.location.href = 'login.php';</script>";
    }

    // Close the prepared statement
    mysqli_stmt_close($stmt);
}
?>