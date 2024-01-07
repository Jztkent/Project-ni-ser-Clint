<?php
include(__DIR__  . "/partial/header.php");
include(__DIR__  . "/partial/nav.php");
?>

<div class="content">
    <h1>Delete Course</h1>
    <form id="deleteForm" action="../handler/handler.course.php" method="POST" onsubmit="return confirmDelete();">
        <input type="hidden" value="delete" name="hidden_method">
        <label for="">Course ID :</label>
        <select name="id" id="">
            <?php
            include "../Login/database.php";

            $qry = "SELECT * FROM course";

            $result = mysqli_query($conn, $qry);

            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['course_id'];

                echo " <option value='$id'>$id</option>";
            }
            ?>
        </select>
        <button type="submit">Delete</button>
    </form>
</div>

<script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete this course?");
    }
</script>

<?php
include(__DIR__  . "/partial/footer.php");
?>