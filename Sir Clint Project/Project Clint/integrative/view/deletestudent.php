<?php
include(__DIR__  . "/partial/header.php");
include(__DIR__  . "/partial/nav.php");
?>

<div class="content">
    <h1>Delete Student</h1>
    <form id="deleteForm" action="../handler/handler.students.php" method="POST" onsubmit="return confirmDelete();">
        <label for="">Student ID :</label>
        <select name="id" id="">
            <?php
            include "../Login/database.php";

            $qry = "SELECT * FROM students";

            $result = mysqli_query($conn, $qry);

            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['id'];

                echo " <option value='$id'>$id</option>";
            }
            ?>
        </select>
        <input type="submit" name="deleteStudent" value="Delete">
    </form>
</div>

<script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete this student?");
    }
</script>

<?php
include(__DIR__  . "/partial/footer.php");
?>