<?php

$db_servername = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "client";

$conn = new mysqli($db_servername, $db_username, $db_password, $db_name);

if ($conn->connect_error) {
    die("connection_error");
}

class CourseModel
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function InsertCourse($courseName, $descriptionName)
    {
        $stmt = $this->conn->prepare("INSERT INTO course (course, description) VALUES (?, ?)");

        if (!$stmt) {
            die("Error in prepare statement: " . $this->conn->error);
        }

        $stmt->bind_param("ss", $courseName, $descriptionName);

        if (!$stmt->execute()) {
            die("Error in execution: " . $stmt->error);
        }

        return true;
    }

    public function UpdateCourse($courseName, $description, $courseId)
    {
        $stmt = $this->conn->prepare("UPDATE course SET course = ?, description = ? WHERE course_id = ?");

        if (!$stmt) {
            die("Error in prepare statement: " . $this->conn->error);
        }

        $stmt->bind_param("ssi", $courseName, $description, $courseId);

        if (!$stmt->execute()) {
            die("Error in execution: " . $stmt->error);
        }

        return true;
    }

    public function DeleteCourse($courseId)
    {
        $stmt = $this->conn->prepare("DELETE FROM course WHERE course_id = ?");

        if (!$stmt) {
            die("Error in prepare statement: " . $this->conn->error);
        }

        $stmt->bind_param("i", $courseId);

        if (!$stmt->execute()) {
            die("Error in execution: " . $stmt->error);
        }

        return true;
    }
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $courseModel = new CourseModel($conn);

    if ($_POST["hidden_method"] == "update") {
        $courseName = $_POST['course'];
        $description = $_POST['description'];
        $courseId = $_POST["id"];

        $updateResult = $courseModel->UpdateCourse($courseName, $description, $courseId);
        if ($updateResult) {
            echo '<script>alert("Successfully updated!"); window.location.href = "../view/course.php";</script>';
        } else {
            echo "Error updating course";
        }
    } elseif ($_POST["hidden_method"] == "delete") {
        $courseId = $_POST["id"];
        $deleteResult = $courseModel->DeleteCourse($courseId);
        if ($deleteResult) {
            echo '<script>alert("Successfully deleted!"); window.location.href = "../view/course.php";</script>';
        } else {
            echo "Error deleting course";
        }
    } else {
        $courseName = $_POST['course'];
        $descriptionName = $_POST['description'];

        if (empty($courseName)) {
            echo "Blank";
        } else {
            $insertResult = $courseModel->InsertCourse($courseName, $descriptionName);

            if ($insertResult) {
                echo '<script>alert("Successfully added!"); window.location.href = "../view/course.php";</script>';
            } else {
                echo "Error inserting course";
            }
        }
    }
}

?>