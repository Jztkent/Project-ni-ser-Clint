<?php
include(__DIR__ . "/partial/header.php");
include(__DIR__ . "/partial/nav.php");

?>


<div class="content">
    <h1>Institute</h1>
    <div class="course-content">
        <a href="insertinstitute.php">Add Institute</a>
        <a href="updateinstitute.php">Update Institute</a>
        <a href="deleteinstitute.php">Delete Institute</a>
    </div>

</div>
    <?php
    include "../Login/database.php";

    $qry = "SELECT * FROM institute";
    $result = mysqli_query($conn, $qry);

    if ($result->num_rows > 0) {
        echo "<div class='table-container'>";
        echo "<table class='t1'>
                <tr>
                    <th>Institute ID</th>
                    <th>Institute</th>
                    <th>Description</th>
                </tr>";

        while ($row = $result->fetch_assoc()) {
            $id = $row['id_institute'];
            echo "<tr>
                    <td>" . $row['id_institute'] . "</td>
                    <td>" . $row['institute'] . "</td>
                    <td>" .$row['description']. "</td>
                  </tr>";
        }

        echo "</table>";
        echo "</div>"; // Close the table-container
    } else {
        echo "<p>No courses found.</p>";
    }
    ?>
</main>
<form action="institutesearch.php" method="get" class="form1">
        <label for="search"></label>
        <input type="text" id="search" name="query" placeholder="Search Institute">
        <button type="submit">Search</button>
    </form>

<?php
include(__DIR__ . "/partial/footer.php");
?>