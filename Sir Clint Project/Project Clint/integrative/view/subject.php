<?php
include(__DIR__ . "/partial/header.php");
include(__DIR__ . "/partial/nav.php");

?>


<div class="content">
    <h1>Subject</h1>
    <div class="course-content">
        <a href="insertsubject.php">Add Subject</a>
        <a href="updatesubject.php">Update Subject</a>
        <a href="deletesubject.php">Delete Subject</a>
    </div>

</div>

<main>
    <?php
    include "../Login/database.php";

    $qry = "SELECT * FROM subjects";
    $result = mysqli_query($conn, $qry);

    if ($result->num_rows > 0) {
        echo "<div class='table-container'>";
        echo "<table class='t1'>
                <tr>
                    <th>Code </th>
                    <th>Description</th>
                    <th>Unit</th>
                    <th>Type</th>
                    <th>Course</th>
                    <th>Institute</th>
                </tr>";

        while ($row = $result->fetch_assoc()) {
            $id = $row['code'];
            echo "<tr>
                    <td>" . $row['code'] . "</td>
                    <td>" . $row['description'] . "</td>
                    <td>" . $row['unit'] . "</td>
                    <td>" . $row['type'] . "</td>
                    <td>" . $row['course'] . "</td>
                    <td>" . $row['institute'] . "</td>
                  </tr>";
        }

        echo "</table>";
        echo "</div>"; // Close the table-container
    } else {
        echo "<p>No courses found.</p>";
    }
    ?>
     <form action="subjectsearch.php" method="get" class="form1">
        <label for="search"></label>
        <input type="text" id="search" name="query" placeholder="Enter Code To Search">
        <button type="submit">Search</button>
    </form>
</main>

<?php
include(__DIR__ . "/partial/footer.php");
?>