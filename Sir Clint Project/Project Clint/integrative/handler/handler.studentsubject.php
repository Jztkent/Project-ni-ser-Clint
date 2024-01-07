<?php

$db_servername = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "client";

$conn = new mysqli($db_servername, $db_username, $db_password, $db_name);

if ($conn->connect_error) {
    die("Connection error: " . $conn->connect_error);
}

class StudentFacultyModel
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function InsertStudentFaculty($student, $faculty)
    {
        $stmt = $this->conn->prepare("INSERT INTO student_subject (student,faculty) VALUES (?, ?)");
        if (!$stmt) {
            die("Error in prepare statement: " . $this->conn->error);
        }
        $stmt->bind_param("ss",$student, $faculty);
        if (!$stmt->execute()) {
            die("Error in execution: " . $stmt->error);
        }
        $stmt->close();
        return true;
    }
}

if($_SERVER['REQUEST_METHOD'] = "POST"){
    if (isset($_POST['insertstudentsubject'])) {
        $student = $_POST['student'];
        $faculty = $_POST['faculty'];

        $students = new StudentFacultyModel($conn);

    
        $result = $students->InsertStudentFaculty($student, $faculty);
         if($result) {
          
            echo '<script>';
            echo 'alert("Successfully added!");';
            echo 'window.location.href = "../view/grade.php";';
            echo '</script>';
    
        }else{
            echo '<script>';
            echo 'alert("Error!");';
            echo 'window.location.href = "../view/grade.studentsubject.php";';
            echo '</script>';
        }
    }

}
