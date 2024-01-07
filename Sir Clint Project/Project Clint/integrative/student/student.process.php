<?php
require_once '../Login/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['id_name'];
    $password = $_POST['subject'];

    // Using prepared statements to prevent SQL injection
    $qry = "SELECT id FROM student_grade WHERE id_name = ? AND subject = ?";
    
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
            // Store the student ID in the session
            session_start();
            $_SESSION['id_name'] = $row['id'];

            // Display a pop-up message (you may choose to remove this line)
            echo "<script>alert('This is Your Gradel!');</script>";

            // Redirect to student profile or dashboard
            header("Location: ../student/showgrade.php");
            exit();
        } else {
            // Login failed - Incorrect username or password
            echo "<script>alert('You dont Have a Grade Yet .'); window.location.href = 'grade.php';</script>";
        }
    } else {
        // Error in executing the statement
        echo "<script>alert('Login Failed: Something went wrong.'); window.location.href = 'grade.php';</script>";
    }

    // Close the prepared statement
    mysqli_stmt_close($stmt);
}
?>