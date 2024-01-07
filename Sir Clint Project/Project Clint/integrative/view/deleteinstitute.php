<?php
include(__DIR__  . "/partial/header.php");
include(__DIR__  . "/partial/nav.php");
?>

<div class="content">
    <h1>Delete Institute</h1>
    <form id="deleteForm" action="../handler/handler.institute.php" method="POST" onsubmit="return confirmDelete();">
        <input type="hidden" value="delete" name="hidden_method">
        <label for="">Institute ID :</label>
        <select name="id" id="">
            <?php
            include "../Login/database.php";

            $qry = "SELECT * FROM institute";

            $result = mysqli_query($conn, $qry);

            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['id_institute'];

                echo " <option value='$id'>$id</option>";
            }
            ?>
        </select>
        <input type="submit">
    </form>
</div>

<script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete this institute?");
    }
</script>

<?php
include(__DIR__  . "/partial/footer.php");
?>