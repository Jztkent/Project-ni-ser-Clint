<?php
include(__DIR__  . "/partial/header.php");
include(__DIR__  . "/partial/nav.php");
?>

<div class="content">
    <h1>Student Dashboard!</h1>
    <div class="course-content">
        <a href="insertstudents.php">Add Student</a>
        <a href="updatestudent.php">Update Student</a>
        <a href="deletestudent.php">Delete Student</a>
    </div>

</div>

<form action="studentsearch.php" method="get" class="form1">
        <label for="search"></label>
        <input type="text" id="search" name="query" placeholder="Search student">
        <button type="submit">Search</button>
        <a href="students.php" class="back-button">Back</a>
    </form>
<form class="form1">
</form>
<?php

include "../Login/database.php";

// Process the search query
if (isset($_GET['query'])) {
    $searchQuery = $_GET['query'];

    // Use the search query in your SQL query for ID, lastname, firstname, and middlename
    $sql = "SELECT * FROM students 
            WHERE id LIKE '%$searchQuery%' OR 
                  lastname LIKE '%$searchQuery%' OR 
                  firstname LIKE '%$searchQuery%' OR 
                  middlename LIKE '%$searchQuery%'";

    $result = $conn->query($sql);

    // Display search results
    if (empty($searchQuery)) {
        echo '<script>
                window.location.href= "students.php";
                alert("Text Field Is Empty.") 
              </script>';
    } else {
        if ($result->num_rows > 0) {
            echo "<div class='table-container'>";
            echo "<table border='1'>
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
                // Output or format the search results as needed
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
        } else {
            echo '<script>
                    window.location.href= "students.php";
                    alert("No results found.")
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