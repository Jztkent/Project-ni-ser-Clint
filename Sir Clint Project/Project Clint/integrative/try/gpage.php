<?php
include "../login/database.php";
session_start();

// Check if the user is logged in
if (isset($_SESSION["faculty_name"])) {
    $faculty_name = $_SESSION["faculty_name"];
?>
    <div class="fname">
        <?php echo "Welcome: " . $faculty_name; ?>
    </div>

    <?php
    $qry = "SELECT subject FROM faculty_subject WHERE faculty = '$faculty_name' GROUP BY subject";
    $result = mysqli_query($conn, $qry);

    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="fsubject">
                <?php echo "Here Are the Subjects That You Handle: " . $row['subject']; ?>
            </div>
        <?php
        }
    } else {
        echo "User not found in the database.";
    }

} else {
    session_unset();
    // You might want to redirect the user to the logout page if not logged in.
    // header("location: logout.php");
}
?>

<a href="student.search.php"><button>View Here</button></a>
<a href="grade.php"><button>Back</button></a>

<form action="gpage.php" method="POST" class="formclass">
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

    <input type="submit" name="show">
</form>

<?php
if (isset($_POST['show'])) {
    $faculty_name = $_POST['fname'];
    session_start();
    $_SESSION["faculty_name"] = $faculty_name;

    // Redirect using header instead of JavaScript
    header("location: gpage.php");
    exit();
}
?>