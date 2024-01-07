<?php
include(__DIR__  . "/partial/header.php");
include(__DIR__  . "/partial/nav.php");
?>

<main>
    <!-- Your main content goes here -->
</main>

<div class="content">
    <h1>Delete Faculty</h1>
    <form id="deleteForm" action="../handler/handler.faculty.php" method="POST" onsubmit="return confirmDelete();">
        <label for="">Faculty ID :</label>
        <select name="id" id="">
            <?php
            include "../Login/database.php";

            $qry = "SELECT * FROM faculty";

            $result = mysqli_query($conn,$qry);

            while($row = mysqli_fetch_assoc($result)){
                $id = $row['id'];

                echo " <option value='$id'>$id</option>";
            }
            ?>
        </select>
        <input type="submit" name="deletefaculty">
    </form>
</div>

<script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete this faculty?");
    }
</script>

<?php
include(__DIR__  . "/partial/footer.php");
?>