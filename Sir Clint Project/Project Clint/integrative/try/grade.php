

<form action="gpage.php" method="POST" class="formclass">
    <label for="" >Faculty Name</label>
   <select name="fname" id="">
    <?php
       include "../Login/database.php";
    


        function getSomeFaculty() {
            global $conn;
            $result = $conn->query("SELECT * FROM faculty_subject");
            $schoolYears = [];
            while ($row = $result->fetch_assoc()) {
                $schoolYears[] = $row;
            }
            return $schoolYears;
        }

        $schoolYears = getSomeFaculty();

        foreach ($schoolYears as $schoolYear) {
            echo "<option>{$schoolYear['faculty']}</option>";
        }

?>
   </select>

    <input type="submit" name="show"> 

</form>

<?php

include "../Login/database.php";
if(isset($_POST['show'])){
    $faculty_name= $_POST['fname'];
session_start();
$sel = "SELECT faculty FROM faculty_subject GROUP BY faculty";


$qry = mysqli_query($conn,$sel);

if($qry){
    $_SESSION["faculty_name"] = $faculty_name;

//  header("location: gpage.php");
echo '<script> 
window.location.href="gpage.php";
alert("Welcome, ' . $faculty_name . '!")
</script>
';
}else{
   echo "Mali";
}

}

?>
