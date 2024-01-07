<?php
include(__DIR__  . "/partial/header.php");
include(__DIR__  . "/partial/nav.php");
?>
<div class="content">
    <h1>Update Student</h1>
    <form action="../handler/handler.students.php" method="POST">
    <label for="">Student Id :</label>
        <!-- <input type="text" name="id" placeholder="Enter Id Number"> -->

        <select name="id" id="">
           
            <?php

            include "../Login/database.php";
      
         $qry = "SELECT * FROM students";

         $result = mysqli_query($conn,$qry);


         while($row  = mysqli_fetch_assoc($result)){
            $id = $row['id'];

echo " <option value='$id'>$id</option>";
       
         }




   ?>
        </select>
        <label for="">Last Name</label>
        <input type="text" name="lastname" placeholder="Enter Lastname" required>
        <label for="">First Name</label>
        <input type="text" name="firstname" placeholder="Enter Firstname" required>
        <label for="">Middle Name</label>
        <input type="text" name="middlename" placeholder="Enter Middlename" required>
        <label for="">Date Of Birth</label>
        <input type="date" name="dateofbirth" placeholder="Enter Birthday" required>
        <label for="">Gender :</label>
     <select name="gender" id="">
        <option value="Male">Male</option>
        <option value="Female">Female</option>
     </select>
        <label for="">Home Address</label>
     <select name="province" id="">
        <option value="Davao Oriental">Davao Oriental</option>
        <option value="Davao De Oro">Davao De Oro</option>
     </select>
     <select name="municipality" id="">
        <option value="Mati">Mati</option>
        <option value="Maragusan">Maragusan</option>
     </select>
        <input type="text" name="zipcode" placeholder="Enter Zib Code" required>
        <input type="text" name="barangay" placeholder="Enter Barangay" required>
        <label for="">Contact Number</label>
        <input type="text" name="contactnumber" placeholder="Enter Contact Number" required>
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
        <label for="">Encase of Emergency</label>
        <input type="text" name="nameofguardian" placeholder="Enter Name of Guardian" required>
        <input type="text" name="number" placeholder="Enter Emergency Number" required>
        <input type="text" name="address" placeholder="Enter Address" required>
        <input type="submit" name="updatestudent">
    </form>
</div>

<?php
include(__DIR__  . "/partial/footer.php");

?>