<?php
include(__DIR__ . "/partial/header.php");
include(__DIR__ . "/partial/nav.php");
?>

<div class="content">
    <h1>Report Dashboard!</h1>
    <div class="course-content">
    </div>

</div>
<main>
     <style>
  
        .form1{
  position: absolute;
  top: 14.5%;
  left: 20%;
}
button {
  padding: 5px 5px; /* Adjust padding as needed */
  background-color: #3498db; /* Button background color */
  color: white; /* Text color */
  border: none; /* Remove border */
  border-radius: 5px; /* Rounded corners */
  cursor: pointer; /* Add pointer cursor on hover */
  transition: background-color 0.3s; /* Smooth transition for background color changes */
  float: left; /* Align the button to the right */
}

button:hover {
  background-color: #2980b9; /* Darker background color on hover */
}
   
</style>
    <?php
    include "../Login/database.php";

    $qry = "SELECT * FROM student_grade";
    $result = mysqli_query($conn, $qry);

    if ($result->num_rows > 0) {
        echo "<div class='table-container'>";
        echo "<table class='t1'>
                <tr>
                <th>Student Id and Name</th>
                <th>Course</th>
                <th>Section and Year</th>
                <th>Subject</th>
                <th>Time</th>
                <th>Grade</th>
                </tr>";

        while ($row = $result->fetch_assoc()) {
            $id = $row['id'];
            echo "<tr>
                    <td>" . $row['id_name'] . "</td>
                    <td>" . $row['course'] . "</td>
                    <td>" . $row['sectionandyear'] . "</td>
                    <td>" . $row['subject'] . "</td>
                    <td>" . $row['time'] . "</td>
                    <td>" . $row['grade'] . "</td>
                  </tr>";
        }

        echo "</table>";
        echo "</div>"; // Close the table-container
    } else {
        echo "<p>No courses found.</p>";
    }
    ?>
    <a href="report.grade.php">Export</a>
</main>
   <div class="content">
    <div class="course-content">
        <a href="report.grade.php">Download Excel File</a>
    </div>  
</div>
<?php
include(__DIR__ . "/partial/footer.php");
?>