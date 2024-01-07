<?php
include(__DIR__  . "/partial/header.php");
include(__DIR__  . "/partial/nav.php");
?>
<div class="content">
    <h1>Update Subject</h1>
    <form action="../handler/handler.subject.php" method="POST">
        <input type="hidden" value="update" name="hidden_method">
        <label for="">Subject Code :</label>
        <!-- <input type="text" name="id" placeholder="Enter subject id"> -->

       <select name="id" id="">
       <?php
            include "../Login/database.php";

            $qry = "SELECT * FROM subjects";

            $result = mysqli_query($conn,$qry);

            while($row = mysqli_fetch_assoc($result)){
                             $id = $row['code'];

                             echo " <option value='$id'>$id</option>";
            }
            ?>
       </select>
        <label for="">Description :</label>
        <input type="text" name="description" placeholder="Description name">
        <label for="">Unit :</label>
        <select name="unit" id="">
            <option value="3 unit">3 unit</option>
            <option value="3 unit">4 unit</option>
            <option value="3 unit">5 unit</option>
            <option value="3 unit">6 unit</option>
        </select>
        <label for="">Type :</label>
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
        <input type="submit">
    </form>
</div>

<?php
include(__DIR__  . "/partial/footer.php");

?>