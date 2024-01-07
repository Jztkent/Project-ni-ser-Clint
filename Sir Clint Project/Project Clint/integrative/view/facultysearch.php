<?php
include(__DIR__  . "/partial/header.php");
include(__DIR__  . "/partial/nav.php");
?>
<div class="content">
    <h1>Search Result</h1>
    <div class="course-content">
        <a href="insertfaculty.php">Add Faculty</a>
        <a href="updatefaculty.php">Update Faculty</a>
        <a href="deletefaculty.php">Delete Faculty</a>

    </div>
</div>

<form action="facultysearch.php" method="get" class="form1">
        <label for="search"></label>
        <input type="text" id="search" name="query" placeholder="Search faculty">
        <button type="submit">Search</button>
        <a href="faculty.php" class="back-button">Back</a>
    </form>

<form class="form1">
</form>

<?php
include "../Login/database.php";

// Process the search query
if (isset($_GET['query'])) {
    $searchQuery = $_GET['query'];

    // Use the search query in your SQL query
    $sql = "SELECT * FROM faculty 
            WHERE id LIKE '%$searchQuery%' 
               OR lastname LIKE '%$searchQuery%'
               OR firstname LIKE '%$searchQuery%'
               OR middlename LIKE '%$searchQuery%'";

    $result = $conn->query($sql);

    // Display search results
    if (empty($searchQuery)) {
        echo '<script>
            window.location.href= "faculty.php";
            alert("Text Field Is Empty.")
        </script>';
    } else {
        if ($result->num_rows > 0) {
            echo "<table border='1'>
                <tr>
                    <th>ID</th>
                    <th>Lastname</th>
                    <th>Firstname</th>
                    <th>Middlename</th>
                    <th>Date Of Birth</th>
                    <th>Gender</th>
                    <th>Institute</th>
                    <th>Course</th>
                    <th>Phone Number</th>
                </tr>";
            while ($row = $result->fetch_assoc()) {
                // Output or format the search results as needed
                echo "<tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["lastname"] . "</td>
                    <td>" . $row["firstname"] . "</td>
                    <td>" . $row["middlename"] . "</td>
                    <td>" . $row["dbirth"] . "</td>
                    <td>" . $row["gender"] . "</td>
                    <td>" . $row["institute"] . "</td>
                    <td>" . $row["course"] . "</td>
                    <td>" . $row["number"] . "</td>
                </tr>"; 
            }
        } else {
            echo '<script>
                window.location.href= "faculty.php";
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