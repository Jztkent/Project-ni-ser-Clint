<?php
include(__DIR__ . "/partial/header.php");
include(__DIR__ . "/partial/nav.php");
?>

<div class="content">
    <h1>Course</h1>
    <div class="course-content">
        <a href="insertcourse.php">Add Course</a>
        <a href="updatecourse.php">Update Course</a>
        <a href="deletecourse.php">Delete Course</a>
    </div>
</div>
    <?php
    include "../Login/database.php";

    $qry = "SELECT * FROM course";
    $result = mysqli_query($conn, $qry);

    if ($result->num_rows > 0) {
        echo "<div class='table-container'>";
        echo "<table class='t1'>
                <tr>
                    <th>Course ID</th>
                    <th>Course</th>
                    <th>Description</th>
                </tr>";

        while ($row = $result->fetch_assoc()) {
            $id = $row['course_id'];
            echo "<tr>
                    <td>" . $row['course_id'] . "</td>
                    <td>" . $row['course'] . "</td>
                    <td>" .$row['description']. "</td>
                  </tr>";
        }

        echo "</table>";
        echo "</div>"; // Close the table-container
    } else {
        echo "<p>No courses found.</p>";
    }
    ?>

<form action="coursesearch.php" method="get" class="form1">
        <label for="search"></label>
        <input type="text" id="search" name="query" placeholder="Search Course">
        <button type="submit">Search</button>
    </form>
<?php
include(__DIR__ . "/partial/footer.php");
?>