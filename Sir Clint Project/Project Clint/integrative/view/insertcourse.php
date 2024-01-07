<?php
include(__DIR__  . "/partial/header.php");
include(__DIR__  . "/partial/nav.php");
?>
<div class="content">
    <h1>Add Course</h1>
    <form action="../handler/handler.course.php" method="POST">
        <label for="">Course :</label>
        <input type="text" name="course" placeholder="Add Course" required>
        <label for="">Description :</label>
        <input type="text" name="description" placeholder="Course Description" required>
        <input type="submit">
    </form>
</div>

<?php
include(__DIR__  . "/partial/footer.php");

?>