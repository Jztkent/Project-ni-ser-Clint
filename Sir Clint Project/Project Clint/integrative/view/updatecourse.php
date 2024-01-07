<?php
include(__DIR__  . "/partial/header.php");
include(__DIR__  . "/partial/nav.php");
?>
<div class="content">
    <h1>Update Course</h1>
    <form action="../handler/handler.course.php" method="POST">
        <input type="hidden" value="update" name="hidden_method">
        <label for="">Course ID :</label>
        <!-- <input type="text" name="id" placeholder="Enter course id"> -->
        <select name="id" id="">
        <?php
            include "../Login/database.php";

            $qry = "SELECT * FROM course";

            $result = mysqli_query($conn,$qry);

            while($row = mysqli_fetch_assoc($result)){
                             $id = $row['course_id'];

                             echo " <option value='$id'>$id</option>";
            }
            ?>
        </select>
        <label for="">Course : </label>
        <input type="text" name="course" placeholder="Course name">
        <label for="">Description :</label>
        <input type="text" name="description" placeholder="Course Description">
        <input type="submit">
    </form>
</div>

<?php
include(__DIR__  . "/partial/footer.php");

?>