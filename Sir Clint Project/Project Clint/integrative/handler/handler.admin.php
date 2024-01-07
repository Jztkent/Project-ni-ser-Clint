<?php
include "../Login/database.php";

if($_SERVER['REQUEST_METHOD'] = "POST"){
    if(isset($_POST['admin'])){
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];  
        $password = $_POST['password'];       
    
    
        $sel = "UPDATE users SET email='$email', password='$password' WHERE lastname='$lastname'";
        $qry = mysqli_query($conn,$sel);
    
        if($qry){
        echo '<script>
        window.location.href="../view/update.admin.php";
        alert("Update Successfully!");
        </script>';
        }else{
            echo "Di Pa";
        }
    
    }
    
}


?>