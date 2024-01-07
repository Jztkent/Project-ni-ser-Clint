<?php

$db_servername = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "client";

$conn = new mysqli($db_servername, $db_username, $db_password, $db_name);

if ($conn->connect_error) {
    die("Connection error: " . $conn->connect_error);
}

class GradeModel
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function insertStudents($id_name, $course, $sectionandyear, $subject, $time, $grade)
    {
        $stmt = $this->conn->prepare("INSERT INTO student_grade (id_name, course, sectionandyear, subject, time, grade) VALUES (?, ?, ?, ?, ?, ?)");

        if (!$stmt) {
            die("Error in prepare statement: " . $this->conn->error);
        }

        $stmt->bind_param("ssssss", $id_name, $course, $sectionandyear, $subject, $time, $grade);

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

if (isset($_POST['gradeinsert'])) {
    $id_name = $_POST['id_name'];
    $course = $_POST['course'];
    $sectionandyear = $_POST['section'];
    $subject = $_POST['subject'];
    $time = $_POST['time'];
    $grade = $_POST['grade'];

    $students = new GradeModel($conn);

    if (empty($id_name)) {
        echo "Blank";
    } else {
        $result = $students->insertStudents($id_name, $course, $sectionandyear, $subject, $time, $grade);

        if ($result) {
            echo '<script>';
            echo 'alert("Successfully added!");';
            echo 'window.location.href = "../faculty/grade.php";';
            echo '</script>';
        } else {
            echo '<script>';
            echo 'alert("Error!");';
            echo 'window.location.href = "../faculty/gpage.php";';
            echo '</script>';
        }
    }
}

?>