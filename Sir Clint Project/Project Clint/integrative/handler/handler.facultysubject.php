<?php

$db_servername = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "client";

$conn = new mysqli($db_servername, $db_username, $db_password, $db_name);

if ($conn->connect_error) {
    die("Connection error: " . $conn->connect_error);
}

class FacultySubjectModel
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function InsertFacultySubject($faculty, $subject)
    {
        $stmt = $this->conn->prepare("INSERT INTO faculty_subject (faculty, subject) VALUES (?, ?)");

        // Check if the prepare statement is successful
        if (!$stmt) {
            die("Error in prepare statement: " . $this->conn->error);
        }

        // Check if the bind_param is successful
        if (!$stmt->bind_param("ss", $faculty, $subject)) {
            die("Error in bind_param: " . $stmt->error);
        }

        $result = $stmt->execute();

        // Check if the execute is successful
        if (!$result) {
            // Log the error to a file
            error_log("Error in execution: " . $stmt->error, 0);
            die("Error in execution. Please try again.");
        }

        $stmt->close(); // Close the statement after execution

        return $result;
    }

    public function getAssignedSubjects($faculty_id)
    {
        $qry = "SELECT subjects.code, subjects.description
                FROM faculty_subject
                JOIN subjects ON faculty_subject.subject = subjects.id
                WHERE faculty_subject.faculty = ?";  // Assuming 'faculty' is the correct column name

        $stmt = $this->conn->prepare($qry);

        // Check if the prepare statement is successful
        if (!$stmt) {
            die("Error in prepare statement: " . $this->conn->error);
        }

        $stmt->bind_param("s", $faculty_id);

        // Check if the bind_param is successful
        if (!$stmt->bind_param("s", $faculty_id)) {
            die("Error in bind_param: " . $stmt->error);
        }

        $result = $stmt->execute();

        // Check if the execute is successful
        if ($result) {
            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            // Log the error to a file
            error_log("Error in execution: " . $stmt->error, 0);
            die("Error in execution. Please try again.");
        }
    }
}

if (isset($_POST['insertfaculty'])) {
    $facultyName = $_POST['faculty']; // Changed variable name to avoid conflict
    $subject = $_POST['subject'];

    $faculty = new FacultySubjectModel($conn);

    if (empty($facultyName) || empty($subject)) {
        echo "Empty fields";
    } else {
        $result = $faculty->InsertFacultySubject($facultyName, $subject); // Corrected variable name
        if ($result) {
            header("Location: ../view/grade.php");
            exit();
        } else {
            header("Location: ../view/grade.facultysubject.php");
            exit();
        }
    }
}

?>