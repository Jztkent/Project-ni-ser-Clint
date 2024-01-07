<?php
include(__DIR__  . "/partial/header.php");
include(__DIR__  . "/partial/nav.php");
?>
<div class="content">
<h1>Add Subject</h1>
    <form action="../handler/handler.subject.php" method="POST">
    <label for="">Code</label>
        <input type="text" name="code" placeholder="Enter Subject Code" required> 
        <label for="">Description</label>
        <input type="text" name="description" placeholder="Enter  Description" required>
        <label for="">Unit</label>
        <select name="unit" id="">
            <option value="3 unit">3 unit</option>
            <option value="3 unit">4 unit</option>
            <option value="3 unit">5 unit</option>
            <option value="3 unit">6 unit</option>
        </select>
        <label for="">Type</label>
        <select name="type" id="">
            <option value="Lecture">Lecture</option>
            <option value="Laboratory">Laboratory</option>
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
        <label for="">Institute Name :</label>
     <select name="institute" id="">
    <?php include "../Login/database.php";
     $qry = "SELECT * FROM institute";
 
     $result = mysqli_query($conn,$qry);
 
     while($row = mysqli_fetch_assoc($result)){
 
         $id = $row['institute'];
     echo "<option value='$id'>$id</option>";
     }
     ?>
     <input type="submit">
    </form>
</div>
     <?php
include(__DIR__  . "/partial/footer.php");

?>