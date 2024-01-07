<?php
include(__DIR__  . "/partial/header.php");
include(__DIR__  . "/partial/nav.php");
?>
<div class="content">
    <h1>Add Institute</h1>
    <form action="../handler/handler.institute.php" method="POST">
        <label for="">Institute :</label>
        <input type="text" name="institute" placeholder="Add Institute" required>
        <label for="">Description :</label>
        <input type="text" name="description" placeholder="Add Institute" required>
        <input type="submit">
    </form>
</div>

<?php
include(__DIR__  . "/partial/footer.php");

?>