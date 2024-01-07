<?php
include(__DIR__ . "/partial/header.php");
include(__DIR__ . "/partial/nav.php");
?>

<div class="content">
    <h1>Delete School Year</h1>
    <form action="../handler/handler.schoolyear.php" method="POST" onsubmit="return confirmDelete()">
        <input type="hidden" value="delete" name="hidden_method">
        <label for="">School Year :</label>

        <select name="id" id="">
            <?php
            include "../Login/database.php";

            $qry = "SELECT * FROM schoolyear";

            $result = mysqli_query($conn, $qry);

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option>{$row['id']}_{$row['schoolyear']}</option>";
            }
            ?>
        </select>

        <input type="submit" name="deleteschoolyear">
    </form>
</div>

<script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete this school year?");
    }
</script>

<?php
include(__DIR__ . "/partial/footer.php");
?>