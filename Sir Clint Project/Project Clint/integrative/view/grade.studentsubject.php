<?php
include(__DIR__  . "/partial/header.php");
include(__DIR__  . "/partial/nav.php");
?>
<div class="content">
    <h1>Add Subject to Student</h1>
    <form action="../handler/handler.studentsubject.php" method="POST">
    <label for="">Student :</label>
        <select name="student" id="">
     <?php

include "../Login/database.php";
    $qry = "SELECT * FROM students";

    $result = mysqli_query($conn,$qry);

    while($row = mysqli_fetch_assoc($result)){

        echo "<option>{$row['firstname']}   {$row['lastname']}</option>";
    }
?>
     </select>


        <label for="">Faculty :</label>
        <select name="faculty" id="">
     <?php

include "../Login/database.php";
    $qry = "SELECT * FROM faculty_subject";

    $result = mysqli_query($conn,$qry);

    while($row = mysqli_fetch_assoc($result)){

        
        echo "<option>{$row['faculty']} - {$row['subject']}</option>";
    }
?>
     </select>


   


        <input type="submit" name="insertstudentsubject">
    </form>
</div>

<?php
include(__DIR__  . "/partial/footer.php");

?>