<?php
session_start();

// Unset all of the session variables
$_SESSION = array();

// Destroy the session.
session_destroy();

// Redirect to faculty login page
header("location: ../Login/login.faculty.php");
exit();
?>