<?php

$db_servername = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "client";

$conn = new mysqli($db_servername, $db_username, $db_password, $db_name);

if ($conn->connect_error) {
    die("connection_error");
}

class SubjectModel
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function InsertSubject($code, $description, $unit, $type, $course, $institute)
    {
        $stmt = $this->conn->prepare("INSERT INTO subjects (code, description, unit, type, course, institute) VALUES (?, ?, ?, ?, ?, ?)");

        // Check if the prepare statement is successful
        if (!$stmt) {
            die("Error in prepare statement: " . $this->conn->error);
        }

        $stmt->bind_param("ssssss", $code, $description, $unit, $type, $course, $institute);

        // Check if the bind_param is successful
        if (!$stmt) {
            die("Error in bind_param: " . $stmt->error);
        }

        $result = $stmt->execute();

        // Check if the execute is successful
        if (!$result) {
            die("Error in execution: " . $stmt->error);
        }

        return $result;
    }

    public function UpdateSubject($description, $unit, $type, $course, $institute, $code)
    {
        $stmt = $this->conn->prepare("UPDATE subjects SET description=?, unit=?, type=?, course=?, institute=? WHERE code=?");

        // Check if the prepare statement is successful
        if (!$stmt) {
            die("Error in prepare statement: " . $this->conn->error);
        }

        $stmt->bind_param("ssssss", $description, $unit, $type, $course, $institute, $code);

        // Check if the bind_param is successful
        if (!$stmt) {
            die("Error in bind_param: " . $stmt->error);
        }

        $result = $stmt->execute();

        // Check if the execute is successful
        if (!$result) {
            die("Error in execution: " . $stmt->error);
        }

        return $result;
    }

    public function DeleteSubject($subjectId)
    {
        $stmt = $this->conn->prepare("DELETE FROM subjects WHERE code = ?");

        // Check if the prepare statement is successful
        if (!$stmt) {
            die("Error in prepare statement: " . $this->conn->error);
        }

        $stmt->bind_param("s", $subjectId);

        // Check if the bind_param is successful
        if (!$stmt) {
            die("Error in bind_param: " . $stmt->error);
        }

        $result = $stmt->execute();

        // Check if the execute is successful
        if (!$result) {
            die("Error in execution: " . $stmt->error);
        }

        return $result;
    }
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if ($_POST["hidden_method"] == "update") {
        $description = $_POST['description'];
        $unit = $_POST['unit'];
        $type = $_POST['type'];
        $course = $_POST['course'];
        $institute = $_POST['institute'];
        $code = $_POST['id'];
        $subjectModel = new SubjectModel($conn);

        $updateResult = $subjectModel->UpdateSubject($description, $unit, $type, $course, $institute, $code);
        if ($updateResult) {
            echo '<script>';
            echo 'alert("Successfully updated!");';
            echo 'window.location.href = "../view/subject.php";';
            echo '</script>';
        } else {
            echo "Error updating subject";
        }
    } else if ($_POST["hidden_method"] == "delete") {
        $subjectId = $_POST["id"];
        $subjectModel = new SubjectModel($conn);

        $deleteResult = $subjectModel->DeleteSubject($subjectId);
        if ($deleteResult) {
            echo '<script>';
            echo 'alert("Successfully deleted!");';
            echo 'window.location.href = "../view/subject.php";';
            echo '</script>';
        } else {
            echo "Error deleting subject";
        }
    } else {
        $code = $_POST['code'];
        $description = $_POST['description'];
        $unit = $_POST['unit'];
        $type = $_POST['type'];
        $course = $_POST['course'];
        $institute = $_POST['institute'];

        $subjectModel = new SubjectModel($conn);

        if (empty($code) || empty($description) || empty($unit) || empty($type) || empty($course) || empty($institute)) {
            echo "Blank fields are not allowed";
        } else {
            $insertResult = $subjectModel->InsertSubject($code, $description, $unit, $type, $course, $institute);

            if ($insertResult) {
                echo '<script>';
                echo 'alert("Successfully added!");';
                echo 'window.location.href = "../view/subject.php";';
                echo '</script>';
            } else {
                echo "Error inserting subject";
            }
        }
    }
}
?>