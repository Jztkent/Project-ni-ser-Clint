<?php
include(__DIR__ . "/partial/header.php");
include(__DIR__ . "/partial/nav.php");
?>
<div class="content">
    <h1>Update School Year</h1>
    <form action="../handler/handler.schoolyear.php" method="POST">
        <input type="hidden" value="update" name="hidden_method">
        <label for="">School Year:</label>
        <!-- <input type="text" name="id" placeholder="Enter course id"> -->
        <select name="id" id="">
        <?php
            include "../Login/database.php";

            $qry = "SELECT * FROM schoolyear";

            $result = mysqli_query($conn,$qry);

            while($row = mysqli_fetch_assoc($result)){

                            
        echo "<option>{$row['id']}_{$row['schoolyear']}</option>";
            }
            ?>
        </select>
        <label for="">Semester :</label>
        <select name="semester" id="">
        <option value="1st Semester">1st Semester</option>
        <option value="2nd Semester">2nd Semester</option>
        <option value="Summer">Summer</option>
        </select>
        <label for="">Status :</label>
        <select name="status" id="">
        <option value="Active">Active</option>
        <option value="Inactive">Inactive</option>
        </select>

        
        <input type="submit" name="updateschoolyear">
    </form>
</div>

<?php
include(__DIR__ . "/partial/footer.php");
?>