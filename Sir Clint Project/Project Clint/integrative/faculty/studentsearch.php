<?php
include(__DIR__ . "/partial/header.php");
include(__DIR__ . "/partial/nav.php");
?>
<div class="content">
    <h1>Search Result</h1>
</div>

<form action="studentsearch.php" method="get" class="form1">
    <label for="search"></label>
    <input type="text" id="search" name="query" placeholder="Enter Student ID or Name">
    <button type="submit">Search</button>
    <a href="student.php" class="back-button">Back</a>
</form>

<?php

include "../Login/database.php";

// Process the search query
if (isset($_GET['query'])) {
    $searchQuery = $_GET['query'];

    // Use the search query in your SQL query
    $sql = "SELECT * FROM student_grade 
            WHERE id_name LIKE '%$searchQuery%' 
               OR course LIKE '%$searchQuery%' 
               OR sectionandyear LIKE '%$searchQuery%'
               OR subject LIKE '%$searchQuery%'
               OR grade LIKE '%$searchQuery%'";

    $result = $conn->query($sql);

    // Display search results

    if (empty($searchQuery)) {
        echo '<script>
        window.location.href= "student.php";
        alert("Text Field Is Empty.") 
        </script>';
    } else {
        if ($result->num_rows > 0) {
            echo "<div class='table-container'>";
            echo "<table border='1'>
                  <tr>
                      <th>Student Id and Name</th>
                      <th>Course</th>
                      <th>Section and Year</th>
                      <th>Subject and Faculty</th>
                      <th>Time</th>
                      <th>Grade</th>
                  </tr>";
            while ($row = $result->fetch_assoc()) {
                // Output or format the search results as needed
                echo "<tr>
                        <td>" . $row['id_name'] . "</td>
                        <td>" . $row['course'] . "</td>
                        <td>" . $row['sectionandyear'] . "</td>
                        <td>" . $row['subject'] . "</td>
                        <td>" . $row['time'] . "</td> 
                        <td>" . $row['grade'] . "</td>
                    </tr>";
            }
        } else {
            echo '<script>
                  window.location.href= "student.php";
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