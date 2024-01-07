<?php
include(__DIR__  . "/partial/header.php");
include(__DIR__  . "/partial/nav.php");
?>
<div class="content">
    <h1>Search Result</h1>
    <div class="course-content">
        <a href="insertcourse.php">Add Course</a>
        <a href="updatecourse.php">Update Course</a>
        <a href="deletecourse.php">Delete Course</a>
    </div>
</div>
<form action="coursesearch.php" method="get" class="form1">
        <label for="search"></label>
        <input type="text" id="search" name="query" placeholder="Search Course">
        <button type="submit">Search</button>
        <a href="course.php" class="back-button">Back</a>
    </form>
<form class="form1">
</form>
<?php

include "../Login/database.php";

// Process the search query
if (isset($_GET['query'])) {
    $searchQuery = $_GET['query'];

    // Use the search query in your SQL query
    $sql = "SELECT * FROM course WHERE course_id LIKE '%$searchQuery%' OR course LIKE '%$searchQuery%' OR description LIKE '%$searchQuery%'";
    $result = $conn->query($sql);

    // Display search results

    if (empty($searchQuery)){
        echo '<script>
        window.location.href= "course.php";
        alert("Text Field Is Empty.")
        </script>
        "';
    } else {
        if ($result->num_rows > 0) {
            echo "<table border='1'>
            <tr>
                <th>Course ID</th>
                <th>Course</th>
                <th>Description</th>
            </tr>";
            while ($row = $result->fetch_assoc()) {
                // Output or format the search results as needed
                echo "<tr>
                <td>" . $row['course_id'] . "</td>
                <td>" . $row['course'] . "</td>
                <td>" . $row['description'] . "</td>
                </tr>";
            }
        } else {
            echo '<script>
            window.location.href= "course.php";
            alert("No matching records found.")
            </script>
            "';
        }
    }
    // Free the result set
    $result->free_result();
}

// Close the database connection
$conn->close();
?>
</body>
</html>