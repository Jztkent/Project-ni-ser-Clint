<?php
include(__DIR__  . "/partial/header.php");
include(__DIR__  . "/partial/nav.php");
?>
<div class="content">
    <h1>Search Result</h1>
    <div class="course-content">
        <a href="insertsubject.php">Add Subject</a>
        <a href="updatesubject.php">Update Subject</a>
        <a href="deletesubject.php">Delete Subject</a>
    </div>

</div>
</div>
<form action="subjectsearch.php" method="get" class="form1">
        <label for="search"></label>
        <input type="text" id="search" name="query" placeholder="Enter Code To Search">
        <button type="submit">Search</button>
        <a href="subject.php" class="back-button">Back</a>
    </form>
<form class="form1">
</form>
<?php

include "../Login/database.php";

// Process the search query
if (isset($_GET['query'])) {
    $searchQuery = $_GET['query'];

    // Use the search query in your SQL query
    $sql = "SELECT * FROM subjects 
            WHERE code LIKE '%$searchQuery%' 
               OR description LIKE '%$searchQuery%'
               OR unit LIKE '%$searchQuery%'
               OR type LIKE '%$searchQuery%'
               OR course LIKE '%$searchQuery%'
               OR institute LIKE '%$searchQuery%'";

    $result = $conn->query($sql);

    // Display search results
    if (empty($searchQuery)) {
        echo '<script>
            window.location.href= "subject.php";
            alert("Text Field Is Empty.")
        </script>';
    } else {
        if ($result->num_rows > 0) {
            echo "<table border='1'>
                <tr>
                    <th>Code</th>
                    <th>Description</th>
                    <th>Unit</th>
                    <th>Type</th>
                    <th>Course</th>
                    <th>Institute</th>
                </tr>";
            while ($row = $result->fetch_assoc()) {
                // Output or format the search results as needed
                echo "<tr>
                    <td>" . $row['code'] . "</td>
                    <td>" . $row['description'] . "</td>
                    <td>" . $row['unit'] . "</td>
                    <td>" . $row['type'] . "</td>
                    <td>" . $row['course'] . "</td>
                    <td>" . $row['institute'] . "</td>
                </tr>";
            }
        } else {
            echo '<script>
                window.location.href= "subject.php";
                alert("No matching records found.")
            </script>';
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