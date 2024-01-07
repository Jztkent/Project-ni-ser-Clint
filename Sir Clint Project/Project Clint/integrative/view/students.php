<?php
include(__DIR__ . "/partial/header.php");
include(__DIR__ . "/partial/nav.php");

?>

<div class="content">
    <h1>Student</h1>
    <div class="course-content">
        <a href="insertstudents.php">Add Student</a>
        <a href="updatestudent.php">Update Student</a>
        <a href="deletestudent.php">Delete Student</a>
    </div>

</div>
<main>
    <?php
    include "../Login/database.php";

    $qry = "SELECT * FROM students";
    $result = mysqli_query($conn, $qry);

    if ($result->num_rows > 0) {
        echo "<div class='table-container'>";
        echo "<table class='t1'>
                <tr>
                <th>ID</th>
                <th>Last name</th>
                <th>First name</th>
                <th>Middle name</th>
                <th>Date of birth</th>
                <th>Gender</th>
                <th>Contact number</th> 
                <th>Institute</th> 
                <th>Course</th> 
                </tr>";

        while ($row = $result->fetch_assoc()) {
            $id = $row['id'];
            echo "<tr>
                    <td>" . $row['id'] . "</td>
                    <td>" . $row['lastname'] . "</td>
                    <td>" . $row['firstname'] . "</td>
                    <td>" . $row['middlename'] . "</td>
                    <td>" . $row['dateofbirth'] . "</td>
                    <td>" . $row['gender'] . "</td>
                    <td>" . $row['contactnumber'] . "</td>
                    <td>" . $row['institute'] . "</td>
                    <td>" . $row['course'] . "</td>
                  </tr>";
        }

        echo "</table>";
        echo "</div>"; // Close the table-container
    } else {
        echo "<p>No courses found.</p>";
    }
    ?>
</main>
<form action="studentsearch.php" method="get" class="form1">
        <label for="search"></label>
        <input type="text" id="search" name="query" placeholder="Search Student">
        <button type="submit">Search</button>
    </form>
<?php
include(__DIR__ . "/partial/footer.php");
?>