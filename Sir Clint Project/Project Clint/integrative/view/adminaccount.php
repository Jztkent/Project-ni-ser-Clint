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

// Check if the admin is logged in
if (isset($_SESSION["admin_id"])) {
    require_once "../login/database.php";

    // Fetch admin data from the database
    $admin_id = $_SESSION["admin_id"];
    $query = $conn->prepare("SELECT username FROM admin_acc WHERE id = ?");
    $query->bind_param("s", $admin_id);
    $query->execute();
    $query->store_result();

    if ($query->num_rows > 0) {
        $query->bind_result($username);
        $query->fetch();
        ?>
        <div class="content">
            <h1>Admin Profile</h1>
            <div class="course-content">
                <label>Welcome Admin: <?php echo $username; ?></label>

            <div class="content">
                <form method="post" action="logout.admin.php">
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
        echo "Error: Admin data not found.";
    }

    $query->close();
    $conn->close();
} else {
    // Redirect to login page if not logged in
    header("location: ../Login/login.php");
    exit();
}
?>

<?php
include(__DIR__ . "/partial/footer.php");
?>