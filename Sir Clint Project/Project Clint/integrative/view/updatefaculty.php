<?php
include(__DIR__  . "/partial/header.php");
include(__DIR__  . "/partial/nav.php");
?>
<div class="content">
    <h1>Update Faculty</h1>
    <form action="../handler/handler.faculty.php" method="POST">
        <input type="hidden" value="update" name="hidden_method">
        <label for="">Faculty Id :</label>
        <!-- <input type="text" name="id" placeholder="Enter Id Number"> -->

        <select name="id" id="">
           
            <?php

            include "../Login/database.php";
      
         $qry = "SELECT * FROM faculty";

         $result = mysqli_query($conn,$qry);


         while($row  = mysqli_fetch_assoc($result)){
            $id = $row['id'];

echo " <option value='$id'>$id</option>";
       
         }

   ?>
        </select>
        <label for="">Last Name :</label>
        <input type="text" name="lastname" placeholder="Last Name">
        <label for="">First Name :</label>
        <input type="text" name="firstname" placeholder="First Name">
        <label for="">Middle Name :</label>
        <input type="text" name="middlename" placeholder="Middle Name">
        <label for="">Date of Birth :</label>
        <input type="date" name="dbirth" placeholder="Enter Date Of Birth">
        <label for="">Gender :</label>
        <select name="gender" id="">
        <option value="Male">Male</option>
        <option value="Female">Female</option>
        </select>
        <label for="">Course Name :</label>
        <select name="course" id="">
         <?php

include "../Login/database.php";
    $qry = "SELECT * FROM course";

    $result = mysqli_query($conn,$qry);

    while($row = mysqli_fetch_assoc($result)){

        $id = $row['course'];
    echo "<option value='$id'>$id</option>";
    }
?>
     </select>
     <select name="institute" id="">
     <?php

include "../Login/database.php";
    $qry = "SELECT * FROM institute";

    $result = mysqli_query($conn,$qry);

    while($row = mysqli_fetch_assoc($result)){

        $id = $row['institute'];
    echo "<option value='$id'>$id</option>";
    }
?>
     </select>
        <label for="">Contact Numebr :</label>
        <input type="text" name="contactnumber" placeholder="Contact Number">
        
        <input type="submit" name="updatefaculty">
    </form>
</div>

<?php
include(__DIR__  . "/partial/footer.php");

?>