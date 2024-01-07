<?php
include(__DIR__  . "/partial/header.php");
include(__DIR__  . "/partial/nav.php");
?>
<div class="content">
    <h1>Search Result</h1>
    <div class="course-content">
        <a href="insertinstitute.php">Add Institute</a>
        <a href="updateinstitute.php">Update Institute</a>
        <a href="deleteinstitute.php">Delete Institute</a>
    </div>
</div>

<form action="institutesearch.php" method="get" class="form1">
        <label for="search"></label>
        <input type="text" id="search" name="query" placeholder="Search Institute">
        <button type="submit">Search</button>
        <a href="institute.php" class="back-button">Back</a>
    </form>

<form class="form1">
</form>
<?php

include "../Login/database.php";

// Process the search query
if (isset($_GET['query'])) {
    $searchQuery = $_GET['query'];

    // Use the search query in your SQL query
    $sql = "SELECT * FROM institute 
            WHERE id_institute LIKE '%$searchQuery%' 
               OR institute LIKE '%$searchQuery%'
               OR description LIKE '%$searchQuery%'";

    $result = $conn->query($sql);

    // Display search results
    if (empty($searchQuery)) {
        echo '<script>
            window.location.href= "institute.php";
            alert("Text Field Is Empty.")
        </script>';
    } else {
        if ($result->num_rows > 0) {
            echo "<table border='1'>
                <tr>
                    <th>ID Number</th>
                    <th>Institute</th>
                    <th>Description</th>
                </tr>";
            while ($row = $result->fetch_assoc()) {
                // Output or format the search results as needed
                echo "<tr>
                    <td>" . $row['id_institute'] . "</td>
                    <td>" . $row['institute'] . "</td>
                    <td>" . $row['description'] . "</td>
                </tr>";
            }
        } else {
            echo '<script>
                window.location.href= "institute.php";
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