<?php
include(__DIR__ . "/partial/header.php");
include(__DIR__ . "/partial/nav.php");

?>


<div class="content">
    <h1>Faculty</h1>
    <div class="course-content">
        <a href="insertfaculty.php">Add Faculty</a>
        <a href="updatefaculty.php">Update Faculty</a>
        <a href="deletefaculty.php">Delete Faculty</a>
    </div>

</div>
<main>

    <?php
    include "../Login/database.php";

    $qry = "SELECT * FROM faculty";
    $result = mysqli_query($conn, $qry);

    if ($result->num_rows > 0) {
        echo "<div class='table-container'>";
        echo "<table class='t1'>
                <tr>
                    <th>Id </th>
                    <th>Lastname</th>
                    <th>Firstname</th>
                    <th>Middlename</th>
                    <th>Date of birth</th>
                    <th>Gender</th>
                    <th>Institute</th>
                    <th>Course</th> 
                    <th>Number</th>
                </tr>";

        while ($row = $result->fetch_assoc()) {
            $id = $row['id'];
            echo "<tr>
                    <td>" . $row['id'] . "</td>
                    <td>" . $row['lastname'] . "</td>
                    <td>" . $row['firstname'] . "</td>
                    <td>" . $row['middlename'] . "</td>
                    <td>" . $row['dbirth'] . "</td>
                    <td>" . $row['gender'] . "</td>
                    <td>" . $row['institute'] . "</td>
                    <td>" . $row['course'] . "</td>
                    <td>" . $row['number'] . "</td>
                  </tr>";
        }

        echo "</table>";
        echo "</div>"; // Close the table-container
    } else {
        echo "<p>No courses found.</p>";
    }
    ?>
    
     <form action="facultysearch.php" method="get" class="form1">
        <label for="search"></label>
        <input type="text" id="search" name="query" placeholder="Search faculty">
        <button type="submit">Search</button>
    </form>
</main>
<?php
include(__DIR__ . "/partial/footer.php");
?>