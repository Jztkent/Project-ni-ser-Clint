<?php
include(__DIR__  . "/partial/header.php");
include(__DIR__  . "/partial/nav.php");
?>
<div class="content">
<h1>Add Faculty</h1>
<form action="../handler/handler.faculty.php" method="POST">
        <label for="">Id number:</label>
        <input type="text" name="id" placeholder="Enter Id Number" required>
     <label for="">Lastname :</label>
     <input type="text" name="lastname" placeholder="Enter Lastname" required>
     <label for="">Firstname :</label>
     <input type="text" name="firstname" placeholder="Enter Firstname" required>
     <label for="">Middle Name :</label>
     <input type="text" name="middlename" placeholder="Enter Middle Name" required>
     <label for="">Date of Birth :</label>
     <input type="date" name="dbirth" placeholder="Enter Date Of Birth" required>
     <label for="">Gender :</label>
     <select name="gender" id="">
        <option value="Male">Male</option>
        <option value="Female">Female</option>
     </select>
     <label for="">Institute :</label>
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
 <label for="">Contact Number :</label>
     <input type="text" name="contactnumber" placeholder="Enter Contact Number" required>
    
     <input type="submit"  name="insertfaculty">
    </form>
    </div>

    <?php
include(__DIR__  . "/partial/footer.php");

?>