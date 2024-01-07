<?php
include(__DIR__ . "/partial/header.php");
include(__DIR__ . "/partial/nav.php");
?>


<div class="content">
    <h1>Student Dashboard!</h1>
    <div class="course-content">
    </div>

</div>
<main>

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
                <th>Subject and Faculty</th>
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
<form action="studentsearch.php" method="get" class="form1">
        <label for="search"></label required>
        <input type="text" id="search" name="query" placeholder="Search">
        <button type="submit">Search</button>
    </form>
  
    
    
<?php
include(__DIR__ . "/partial/footer.php");
?>