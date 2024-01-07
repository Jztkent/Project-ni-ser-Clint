<?php
include(__DIR__  . "/partial/header.php");
include(__DIR__  . "/partial/nav.php");
?>
<div class="content">
    <h1>Add Subject to Faculty</h1>
    <form action="../handler/handler.facultysubject.php" method="POST">
        <label for="">Faculty Id :</label>
        <!-- <input type="text" name="id" placeholder="Enter Id Number"> -->

        <select name="faculty" id="">
           
           <?php

           include "../Login/database.php";
     
        $qry = "SELECT * FROM faculty";

        $result = mysqli_query($conn,$qry);


        while($row  = mysqli_fetch_assoc($result)){
           $id = $row['lastname'];

echo " <option value='$id'>$id</option>";
      
        }




  ?>
       </select>
        <label for="">Subject :</label>
        <select name="subject" id="">
     <?php

include "../Login/database.php";
    $qry = "SELECT * FROM subjects";

    $result = mysqli_query($conn,$qry);

    while($row = mysqli_fetch_assoc($result)){

       

    echo "<option>{$row['code']}_{$row['description']}</option>";
    }
?>
     </select>
     <input type="submit" name="insertfaculty">
    </form>
</div>

<?php
include(__DIR__  . "/partial/footer.php");

?>