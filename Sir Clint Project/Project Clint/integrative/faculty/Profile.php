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

// Check if the faculty is logged in
if (isset($_SESSION["faculty_id"])) {
    require_once "../login/database.php";

    // Fetch faculty data from the database
    $faculty_id = $_SESSION["faculty_id"];
    $query = $conn->prepare("SELECT id, firstname, lastname, middlename FROM faculty WHERE id = ?");
    $query->bind_param("s", $faculty_id);
    $query->execute();
    $query->store_result();

    if ($query->num_rows > 0) {
        $query->bind_result($id, $firstname, $lastname, $middlename);
        $query->fetch();
        ?>
        <div class="content">
            <h1>Faculty Profile</h1>
            <div class="course-content">
                <label>Welcome, <?php echo $firstname . " " . $middlename . " " . $lastname; ?></label><br>
              

                <div class="content">
                <form method="post" action="logout.faculty.php">
                    <input type="submit" name="logout" value="Logout" onclick="return confirmLogout();">
                </form>

                <script>
                    function confirmLogout() {
                        return confirm("Are you sure you want to log out?");
                    }
                </script>
                </div>
            </div>
        </div>
        <?php
    } else {
        echo "Error: Faculty data not found.";
    }

    $query->close();
    $conn->close();
} else {
    // Redirect to faculty login page if not logged in
    header("location: /Login/login.faculty.php");
    exit();
}
?>

<?php
include(__DIR__ . "/partial/footer.php");
?>