<?php
include(__DIR__  . "/partial/header.php");
include(__DIR__  . "/partial/nav.php");
?>

<div class="content">
    <h1>Delete Subject</h1>
    <form id="deleteForm" action="../handler/handler.subject.php" method="POST" onsubmit="return confirmDelete();">
        <input type="hidden" value="delete" name="hidden_method">
        <label for="">Subject Code :</label>
        <select name="id" id="">
            <?php
            include "../Login/database.php";

            $qry = "SELECT * FROM subjects";

            $result = mysqli_query($conn, $qry);

            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['code'];

                echo " <option value='$id'>$id</option>";
            }
            ?>
        </select>
        <input type="submit">
    </form>
</div>

<script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete this subject?");
    }
</script>

<?php
include(__DIR__  . "/partial/footer.php");
?>