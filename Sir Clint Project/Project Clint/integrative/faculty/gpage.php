<?php
include(__DIR__ . "/partial/header.php");
include(__DIR__ . "/partial/nav.php");
include "../login/database.php";

?>


<?php
$qry = "    SELECT * FROM schoolyear ";


$result = mysqli_query($conn,$qry);

while($row = mysqli_fetch_assoc($result)){
    $id = $row['status'];
$year = $row['schoolyear'];
    $semester = $row['semester'];
    ?>
              
    <?php
                
    if ($id == 'Active') {
                 
?>
             <div class="content">
            
 <h1>Insert Grade Student Information Form</h1>
             </div>
    <form action="gradeprocess.php" method="post" class="content">

    <label for="">Student Id and Name :</label>
        <!-- <input type="text" name="id" placeholder="Enter Id Number"> -->

        <select name="id_name" id="">
           
            <?php

            include "../Login/database.php";
      
         $qry = "SELECT * FROM students";

         $result = mysqli_query($conn,$qry);


         while($row  = mysqli_fetch_assoc($result)){
          echo "<option>{$row['id']}   {$row['lastname']}</option>";
       
         }
?>
        </select>
        
      </select> 

        <label for="">Course:</label>
        <select name="course" id="">
           
           <?php

           include "../Login/database.php";
     
        $qry = "SELECT * FROM course";

        $result = mysqli_query($conn,$qry);


        while($row  = mysqli_fetch_assoc($result)){
          echo "<option>{$row['course']}   {$row['lastname']}</option>";
      
        }
?>
       </select> 


        <label for="">Section and Year Level :</label>
      <input type="text" name="section" placeholder="Enter Section" required>
        <!-- <input type="text" name="yearlevel" placeholder="Enter Year Level"> -->

        <label for="">Subject:</label>
        <select name="subject" id="">
           
           <?php

           include "../Login/database.php";
     
        $qry = "SELECT * FROM faculty_subject";

        $result = mysqli_query($conn,$qry);


        while($row  = mysqli_fetch_assoc($result)){
          echo "<option>{$row['faculty']}   {$row['subject']} </option>";
      
        }
?>
       </select> 
      

        <label for="time">Time:</label>
        <input type="time" id="time" name="time" required>

        <label for="grade">Grade:</label>
      <input type="text" name="grade" placeholder="Enter Student Grade" required>

        <input type="submit" name="gradeinsert"></input>
        
    </form>
    </div>

             <?php

               }
            }