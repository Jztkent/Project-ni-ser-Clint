<?php
include(__DIR__ . "/partial/header.php");
include(__DIR__ . "/partial/nav.php");
?>

<style>
    .student-info {
        border: 2px solid #ccc;
        padding: 15px;
        margin: 10px;
        transition: transform 0.3s ease-in-out;
        max-width: 300px; /* Set a maximum width for the box */
    }

    .student-info:hover {
        transform: scale(1.1); /* Enlarge the box on hover */
    }
</style>

<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['id_name'])) {
    header("Location: grade.php");
    exit();
}

require_once '../Login/database.php';

// Fetch student details based on the stored session ID
$qry = "SELECT * FROM student_grade WHERE id = ?";
$stmt = mysqli_prepare($conn, $qry);
mysqli_stmt_bind_param($stmt, "s", $_SESSION['id_name']);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($result)) {
    // Display the student information
    include(__DIR__ . "/partial/header.php");
    include(__DIR__ . "/partial/nav.php");
?>

    <div class="content">
        <h1>This is your Grade, <?php echo $row['id_name']; ?>!</h1>
        <div class="student-info">
            <p><strong>Student Name and ID Number:</strong> <?php echo $row['id_name']; ?></p>
            <p><strong>Course:</strong> <?php echo $row['course']; ?></p>
            <p><strong>Section and Year:</strong> <?php echo $row['sectionandyear']; ?></p>
            <p><strong>Teacher and Subject:</strong> <?php echo $row['subject']; ?></p>
            <p><strong>Time:</strong> <?php echo $row['time']; ?></p>
            <p><strong>Grade:</strong> <?php echo $row['grade']; ?></p>
        </div>
    </div>

<?php
    include(__DIR__ . "/partial/footer.php");
} else {
    // If for some reason the student details are not found
    echo "<script>alert('Student details not found.'); window.location.href = 'grade.php';</script>";
    exit();
}
?>