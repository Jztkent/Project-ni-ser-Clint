<?php
use LDAP\Result;

$db_servername = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "client";

$conn = new mysqli($db_servername, $db_username, $db_password, $db_name);

if ($conn->connect_error) {
    die("connection_error");
}

class FacultyModel
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function InsertFaculty($id, $lastname, $firstname, $middlename, $dbirth, $gender, $institute, $course, $number)
    {
        $stmt = $this->conn->prepare("INSERT INTO faculty (id, lastname, firstname, middlename, dbirth, gender, institute, course, number) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

        // Check if the prepare statement is successful
        if (!$stmt) {
            die("Error in prepare statement: " . $this->conn->error);
        }

        $stmt->bind_param("sssssssss", $id, $lastname, $firstname, $middlename, $dbirth, $gender, $institute, $course, $number);

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

   public function UpdateFaculty($lastname, $firstname, $middlename, $dbirth, $gender, $institute, $course, $number, $id)
    {
        $stmt = $this->conn->prepare("UPDATE faculty SET lastname=?, firstname=?, middlename=?, dbirth=?, gender=?, institute=?, course=?, number=? WHERE id=?");

        // Check if the prepare statement is successful
        if (!$stmt) {
            die("Error in prepare statement: " . $this->conn->error);
        }

        $stmt->bind_param("sssssssss", $lastname, $firstname, $middlename, $dbirth, $gender, $institute, $course, $number, $id);

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

    public function DeleteFaculty($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM faculty WHERE id = ?");

        // Check if the prepare statement is successful
        if (!$stmt) {
            die("Error in prepare statement: " . $this->conn->error);
        }

        $stmt->bind_param("s", $id);

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


if(isset($_POST['insertfaculty'])){
    $id = $_POST['id'];
            $lastname = $_POST['lastname'];
            $firstname = $_POST['firstname'];
            $middlename = $_POST['middlename'];
            $dbirth = $_POST['dbirth'];
            $gender = $_POST['gender'];
            $institute = $_POST['institute'];
            $course = $_POST['course'];
            $number = $_POST['contactnumber'];

         

            $faculty = new FacultyModel($conn);
            if(empty($id)){
                echo "Empty";
            }else{

                

                $result = $faculty->InsertFaculty($id, $lastname, $firstname, $middlename, $dbirth, $gender, $institute, $course, $number);
                if($result){
                    echo '<script>';
                    echo 'alert("Successfully added!");';
                    echo 'window.location.href = "../view/faculty.php";';
                    echo '</script>';
                }else{
                    echo '<script>';
                    echo 'alert("Error!");';
                    echo 'window.location.href = "../view/updatefaculty.php";';
                    echo '</script>';
                }

            }


}


if(isset($_POST['updatefaculty'])){
    $id = $_POST['id'];
            $lastname = $_POST['lastname'];
            $firstname = $_POST['firstname'];
            $middlename = $_POST['middlename'];
            $dbirth = $_POST['dbirth'];
            $gender = $_POST['gender'];
            $institute = $_POST['institute'];
            $course = $_POST['course'];
            $number = $_POST['contactnumber'];

         

            $faculty = new FacultyModel($conn);
            if(empty($id)){
                echo "Empty";
            }else{

                

                $result = $faculty->UpdateFaculty($lastname, $firstname, $middlename, $dbirth, $gender, $institute, $course, $number,$id);
                if($result){
                    echo '<script>';
                    echo 'alert("Successfully updated!");';
                    echo 'window.location.href = "../view/faculty.php";';
                    echo '</script>';
                }else{
                    echo '<script>';
                    echo 'alert("Error!");';
                    echo 'window.location.href = "../view/updatefaculty.php";';
                    echo '</script>';
                }

            }


}



if(isset($_POST['deletefaculty'])){
    $id = $_POST['id'];
          

       $qry ="DELETE FROM faculty WHERE id = '$id'";  

       $result = mysqli_query($conn,$qry);

       
            if(empty($id)){
                 echo "Empty";
            }else{

                

                
                if($result){
                    echo '<script>';
                    echo 'alert("Successfully deleted!");';
                    echo 'window.location.href = "../view/faculty.php";';
                    echo '</script>';
                }else{
                    echo '<script>';
                    echo 'alert("Error!");';
                    echo 'window.location.href = "../view/deletefaculty.php";';
                    echo '</script>';
                }

            }


}




?>
