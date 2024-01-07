<?php
$db_servername = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "client";

$conn = new mysqli($db_servername, $db_username, $db_password, $db_name);

if ($conn->connect_error) {
    die("Connection error: " . $conn->connect_error);
}

class SchoolYearModel
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function InsertSchoolYear($schoolyear, $semester, $status)
    {
        // Deactivate existing active school years
        $this->DeactivateActiveSchoolYears();

        // Insert the new school year
        $stmt = $this->conn->prepare("INSERT INTO schoolyear (schoolyear, semester, status) VALUES (?, ?, ?)");
        if (!$stmt) {
            die("Error in prepare statement: " . $this->conn->error);
        }

        $stmt->bind_param("sss", $schoolyear, $semester, $status);
        if (!$stmt->execute()) {
            die("Error in execution: " . $stmt->error);
        }

        $stmt->close();
        return true;
    }

    private function DeactivateActiveSchoolYears()
    {
        // Deactivate all active school years
        $deactivateStmt = $this->conn->prepare("UPDATE schoolyear SET status = 'Inactive' WHERE status = 'Active'");
        if (!$deactivateStmt) {
            die("Error in prepare statement: " . $this->conn->error);
        }

        if (!$deactivateStmt->execute()) {
            die("Error in execution: " . $deactivateStmt->error);
        }

        $deactivateStmt->close();
    }

    public function UpdateSchoolYear($semester, $status, $id)
    {
        // If the status is being updated to 'Active', deactivate other school years
        if ($status === 'Active') {
            $this->DeactivateActiveSchoolYears();
        }

        $stmt = $this->conn->prepare("UPDATE schoolyear SET semester=?, status=? WHERE id=?");
        if (!$stmt) {
            die("Error in prepare statement: " . $this->conn->error);
        }
        $stmt->bind_param("sss", $semester, $status, $id);
        if (!$stmt->execute()) {
            die("Error in execution: " . $stmt->error);
        }
        $stmt->close();
        return true;
    }

    public function DeleteSchoolYear($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM schoolyear WHERE id = ?");
        if (!$stmt) {
            die("Error in prepare statement: " . $this->conn->error);
        }
        $stmt->bind_param("s", $id);
        if (!$stmt->execute()) {
            die("Error in execution: " . $stmt->error);
        }
        $stmt->close();
        return true;
    }
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['insertschool'])) {
        $schoolyear = $_POST['schoolyear'];
        $semester = $_POST['semester'];
        $status = $_POST['status'];

        $students = new SchoolYearModel($conn);

        $result = $students->InsertSchoolYear($schoolyear, $semester, $status);
        if ($result) {
            echo '<script>';
            echo 'alert("Successfully added!");';
            echo 'window.location.href = "../view/schoolyear.php";';
            echo '</script>';
        } else {
            echo '<script>';
            echo 'alert("Error!");';
            echo 'window.location.href = "../view/schoolyear.insert.php";';
            echo '</script>';
        }
    }

    if (isset($_POST['updateschoolyear'])) {
        $id = $_POST['id'];
        $semester = $_POST['semester'];
        $status = $_POST['status'];

        $students = new SchoolYearModel($conn);
        if (empty($id)) {
            echo "Empty";
        } else {
            $result = $students->UpdateSchoolYear($semester, $status, $id);
            if ($result) {
                echo '<script>';
                echo 'alert("Successfully updated!");';
                echo 'window.location.href = "../view/schoolyear.php";';
                echo '</script>';
            } else {
                echo '<script>';
                echo 'alert("Error!");';
                echo 'window.location.href = "../view/schoolyear.update.php";';
                echo '</script>';
            }
        }
    }

    if (isset($_POST['deleteschoolyear'])) {
        $id = $_POST['id'];

        $qry = "DELETE FROM schoolyear WHERE id = '$id'";
        $result = mysqli_query($conn, $qry);

        if (empty($id)) {
            echo "Empty";
        } else {
            if ($result) {
                echo '<script>';
                echo 'alert("Successfully deleted!");';
                echo 'window.location.href = "../view/schoolyear.php";';
                echo '</script>';
            } else {
                echo '<script>';
                echo 'alert("Error!");';
                echo 'window.location.href = "../view/schoolyear.delete.php";';
                echo '</script>';
            }
        }
    }
}
?>