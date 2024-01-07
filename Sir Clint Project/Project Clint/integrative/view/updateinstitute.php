<?php
include(__DIR__  . "/partial/header.php");
include(__DIR__  . "/partial/nav.php");
?>
<div class="content">
    <h1>Update Institute</h1>
    <form action="../handler/handler.institute.php" method="POST">
        <input type="hidden" value="update" name="hidden_method">
        <label for="">Institute ID :</label>
        <!-- <input type="text" name="id" placeholder="Enter institute id"> -->
<select name="id_institute" id="">
    
<?php
            include "../Login/database.php";

            $qry = "SELECT * FROM institute";

            $result = mysqli_query($conn,$qry);

            while($row = mysqli_fetch_assoc($result)){
                             $id = $row['id_institute'];

                             echo " <option value='$id'>$id</option>";
            }
            ?>
</select>
        <label for="">Institute :</label>
        <input type="text" name="institute" placeholder="Institute name">
        <label for="">Description :</label>
        <input type="text" name="description" placeholder="Institute name">
        <input type="submit">
    </form>
</div>

<?php
include(__DIR__  . "/partial/footer.php");

?>