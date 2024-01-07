<?php
include(__DIR__  . "/partial/header.php");
include(__DIR__  . "/partial/nav.php");
?>


<div class="content">
    <h1>Add School Year</h1>
    <form action="../handler/handler.schoolyear.php" method="POST">
        <label for="">School Year :</label>
        <input type="text" name="schoolyear" placeholder="Add School Year" required>
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
      
     </select>
     <input type="submit" name="insertschool">
    </form>
</div>

<?php
include(__DIR__  . "/partial/footer.php");

?>