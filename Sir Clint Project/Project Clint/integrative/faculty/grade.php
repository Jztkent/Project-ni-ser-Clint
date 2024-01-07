<?php
include(__DIR__ . "/partial/header.php");
include(__DIR__ . "/partial/nav.php");
include "../login/database.php";
session_start();

// Check if the user is logged in
if (isset($_SESSION["faculty_name"])) {
    $faculty_name = $_SESSION["faculty_name"];
?>
    <div class="content">
        <h1>Grade Dashboard!</h1>
    </div>
    <div class="content">
        <?php echo "Welcome: " . $faculty_name; ?>
    </div>

    <?php
    $qry = "SELECT subject FROM faculty_subject WHERE faculty = '$faculty_name' GROUP BY subject";
    $result = mysqli_query($conn, $qry);

    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="content">
                <?php echo "Here Are the Subjects That You Handle: " . $row['subject']; ?>
            </div>
        <?php
        }
    } else {
        echo "No subjects found for the faculty in the database.";
    }

} else {
    session_unset();
    // You might want to redirect the user to the logout page if not logged in.
    // header("location: logout.php");
}
?>
    

    <form action="grade.php" method="POST" class="content">
        <label for="fname">Faculty Name</label>
        <select name="fname" id="fname">
            <?php
            // Use prepared statements to prevent SQL injection
            $stmt = $conn->prepare("SELECT DISTINCT faculty FROM faculty_subject");
            $stmt->execute();
            $result = $stmt->get_result();

            while ($row = $result->fetch_assoc()) {
                echo "<option>{$row['faculty']}</option>";
            }
            ?>
        </select>
        <input type="submit" name="show" value="Show">
    </form>

    <?php
    include "../login/database.php";

    $sel = mysqli_query($conn, "SELECT * FROM schoolyear");

    if ($row = mysqli_fetch_assoc($sel)) {
        $status = $row['status'];

        if ($status == 'active') { // Fixed the assignment operator (=) to equality operator (==)
    ?>
            <form action="add_grade.php" method="POST" class="content">
                <!-- Add your form fields here -->
            </form>
    <?php
        }
    }
    ?>
    
    <?php
    if (isset($_POST['show'])) {
        $faculty_name = $_POST['fname'];
        session_start();
        $_SESSION["faculty_name"] = $faculty_name;

        // Redirect using header instead of JavaScript
        header("location: grade.php");
        exit();
    }
    ?>

    <div class="content">   
        <div class="course-content">
            <a href="gpage.php">Add Grade</a>
        </div>
    </div>

<?php
