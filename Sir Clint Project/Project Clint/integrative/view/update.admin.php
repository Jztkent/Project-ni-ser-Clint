<style>
    .only{
        border: none;
    }
</style>



<?php
include(__DIR__  . "/partial/header.php");
include(__DIR__  . "/partial/nav.php");
include "../Login/database.php";




session_start();

if (isset($_SESSION["email"])) {
    $email = $_SESSION["email"];

   

    // Assuming you have a database connection named $conn
    $qry = "SELECT * FROM users WHERE email  = '$email'";
    $result = mysqli_query($conn, $qry);

    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
       
      
    } else {
        echo "User not found in the database.";
    }
} else {
    // Redirect to the login page if not logged in
  echo "Mali";
    exit();
}
  
include(__DIR__ . "/partial/footer.php");
?>

<div class="content">
<h1>Register Admin</h1>
<form action="../handler/handler.admin.php" method="POST">
     <label for="">Lastname :</label>
     <input type="text" readonly name="lastname" value="<?php echo $row['lastname'] ?>" class="only">
     <label for="">Email : </label>
     <input type="text" name="email" value="<?php  echo $row['email']; ?>" required>
     <label for="">Password :</label>
     <input type="password" name="password" value="<?php  echo $row['password']; ?>" required>
     <input type="submit" name="admin">


</form>
