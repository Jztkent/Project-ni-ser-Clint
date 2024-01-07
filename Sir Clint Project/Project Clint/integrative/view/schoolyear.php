<?php
include(__DIR__ . "/partial/header.php");
include(__DIR__ . "/partial/nav.php");
?>
<div class="content">
    <h1>School Year</h1>
    <div class="course-content">
        <a href="schoolyear.insert.php">Add School Year</a>
        <a href="schoolyear.update.php">Update School Year</a>
        <a href="schoolyear.delete.php">Delete School Year</a>
    </div>
    <main>
    <?php
    include "../Login/database.php";

    $qry = "SELECT * FROM schoolyear";
    $result = mysqli_query($conn, $qry);

    if ($result->num_rows > 0) {
        echo "<div class='table-container'>";
        echo "<table class='t1'>
                <tr>
                    <th>Id </th>
                    <th>School Year</th>
                    <th>Semester</th>
                    <th>Status</th>
                </tr>";

        while ($row = $result->fetch_assoc()) {
            $id = $row['id'];
            echo "<tr>
                    <td>" . $row['id'] . "</td>
                    <td>" . $row['schoolyear'] . "</td>
                    <td>" . $row['semester'] . "</td>
                    <td>" . $row['status'] . "</td>
                  </tr>";
        }

        echo "</table>";
        echo "</div>"; // Close the table-container
    } else {
        echo "<p>No school year found.</p>";    
    }
    ?>
    
    </form>
</main>

<?php
include(__DIR__ . "/partial/footer.php");
?>