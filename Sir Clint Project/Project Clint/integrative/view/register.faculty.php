<?php
include(__DIR__  . "/partial/header.php");
include(__DIR__  . "/partial/nav.php");
?>
<div class="content">
<h1>Register Faculty</h1>
<form action="../handler/handler.account.faculty.php" method="POST">
        <label for="">Id number:</label>
        <input type="text" name="id" placeholder="Enter Id Number" required>
     <label for="">Lastname :</label>
     <input type="text" name="lastname" placeholder="Enter Firstname" required>
     <label for="">Firstname :</label>
     <input type="text" name="firstname" placeholder="Enter Lastname" required>
     <label for="">Middle Name :</label>
     <input type="text" name="middlename" placeholder="Enter Middle Name" required>
     <label for="">Date of Birth :</label>
     <input type="date" name="dateofbirth" placeholder="Enter Date Of Birth" required>
     <label for="">Gender :</label>
     <select name="gender" id="">
        <option value="Male">Male</option>
        <option value="Female">Female</option>
     </select>
     <label for="">Email :</label>
     <input type="text" name="email" placeholder="Enter Email" required>
     <label for="">Password :</label>
     <input type="password" name="password" placeholder="Enter Password" required>
     <input type="submit" name="registerfaculty">
    <?php
include(__DIR__ . "/partial/footer.php");
?>