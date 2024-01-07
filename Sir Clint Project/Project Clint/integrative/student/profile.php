<?php
include(__DIR__ . "/partial/header.php");
include(__DIR__ . "/partial/nav.php");
?>
<style>
    .label {
        color: blue;
    }
</style>
<?php
session_start();

// Check if the student is logged in
if (isset($_SESSION["student_id"])) {
    require_once "../login/database.php";

    // Fetch student data from the database
    $student_id = $_SESSION["student_id"];
    $query = $conn->prepare("SELECT id, firstname, lastname, middlename, course, institute FROM students WHERE id = ?");
    $query->bind_param("s", $student_id);
    $query->execute();
    $query->store_result();

    if ($query->num_rows > 0) {
        $query->bind_result($id, $firstname, $lastname, $middlename, $course, $institute);
        $query->fetch();
        ?>
        <div class="content">
            <h1>Student Profile</h1>
            <div class="course-content">
                <label>Welcome, <?php echo $firstname . " " . $middlename . " " . $lastname; ?></label>
                <label> : ID: <?php echo $id; ?></label>
                <label> : Course: <?php echo $course; ?></label>
                <label> : Institute: <?php echo $institute; ?></label>

                <!-- Logout Form -->
                <form method="post" action="logout.student.php">
                    <input type="submit" name="logout" value="Logout" onclick="return confirmLogout();">
                </form>

                <script>
                    function confirmLogout() {
                        return confirm("Are you sure you want to log out?");
                    }
                </script>
            </div>
        </div>
        <?php
    } else {
        echo "Error: Student data not found.";
    }

    $query->close();
    $conn->close();
} else {
    // Redirect to login page if not logged in
    header("location: login.student.php");
    exit();
}
?>

<?php
include(__DIR__ . "/partial/footer.php");
?>