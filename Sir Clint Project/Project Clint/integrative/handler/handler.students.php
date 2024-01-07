<?php



$db_servername = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "client";

$conn = new mysqli($db_servername, $db_username, $db_password, $db_name);


if($conn-> connect_error){
die("connection_error");
}




class StudentModel{


private $conn;


public function __construct($conn)
{
    $this->conn=$conn;
} 

public function InsertStudents($id,$lastname,$firstname,$middlename,$dateofbirth,$gender,$province,$municipality,$zipcode,$barangay,$contactnumber,$institute,$course,$nameofguardian,$number,$address){
    $stmt = $this->conn->prepare("INSERT INTO students (id,lastname,firstname,middlename,dateofbirth,gender,province,municipality,zipcode,barangay,contactnumber,institute,course,nameofguardian,number,address) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    if (!$stmt) {
        die("Error in prepare statement: " . $this->conn->error);
    }
    $stmt->bind_param("ssssssssssssssss",$id,$lastname,$firstname,$middlename,$dateofbirth,$gender,$province,$municipality,$zipcode,$barangay,$contactnumber,$institute,$course,$nameofguardian,$number,$address);
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

public function UpdateStudents($lastname,$firstname,$middlename,$dateofbirth,$gender,$province,$municipality,$zipcode,$barangay,$contactnumber,$institute,$course,$nameofguardian,$number,$address,$id)
{
    $stmt = $this->conn->prepare("UPDATE students SET lastname=?,firstname=?,middlename=?,dateofbirth=?,gender=?,province=?,municipality=?,zipcode=?,barangay=?,contactnumber=?,institute=?,course=?,nameofguardian=?,number=?,address=? WHERE id=?");

    // Check if the prepare statement is successful
    if (!$stmt) {
        die("Error in prepare statement: " . $this->conn->error);
    }

    $stmt->bind_param("ssssssssssssssss", $lastname,$firstname,$middlename,$dateofbirth,$gender,$province,$municipality,$zipcode,$barangay,$contactnumber,$institute,$course,$nameofguardian,$number,$address,$id);

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
public function DeleteStudents($id)
{
    $stmt = $this->conn->prepare("DELETE FROM students WHERE id = ?");

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


if(isset($_POST['insertstudent'])){
    $id = $_POST['id'];
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $dateofbirth = $_POST['dateofbirth'];
    $gender = $_POST['gender'];
    $province = $_POST['province'];
    $municipality = $_POST['municipality'];
    $zipcode = $_POST['zipcode'];
    $barangay = $_POST['barangay'];
    $contactnumber = $_POST['contactnumber'];
    $institute = $_POST['institute'];
    $course = $_POST['course'];
    $nameofguardian = $_POST['nameofguardian'];
    $emergencynumber = $_POST['number'];
    $address = $_POST['address'];
   


$students = new StudentModel($conn);

if(empty($id) ){
 echo "Blank";

}else{
  
    $result = $students->InsertStudents($id,$lastname,$firstname,$middlename,$dateofbirth,$gender,$province,$municipality,$zipcode,$barangay,$contactnumber,$institute,$course,$nameofguardian,$emergencynumber,$address);

    if($result){
        echo '<script>';
        echo 'alert("Successfully added!");';
        echo 'window.location.href = "../view/students.php";';
        echo '</script>';
    }else{
        echo '<script>';
        echo 'alert("Error!");';
        echo 'window.location.href = "../view/insertstudents.php";';
        echo '</script>';
    }

    }
}



if(isset($_POST['updatestudent'])){
    $id = $_POST['id'];
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $dateofbirth = $_POST['dateofbirth'];
    $gender = $_POST['gender'];
    $province = $_POST['province'];
    $municipality = $_POST['municipality'];
    $zipcode = $_POST['zipcode'];
    $barangay = $_POST['barangay'];
    $contactnumber = $_POST['contactnumber'];
    $institute = $_POST['institute'];
    $course = $_POST['course'];
    $nameofguardian = $_POST['nameofguardian'];
    $emergencynumber = $_POST['number'];
    $address = $_POST['address'];
   

         

            $students = new StudentModel($conn);
            if(empty($id)){
                echo "Empty";
            }else{

                

        $result = $students->UpdateStudents($lastname,$firstname,$middlename,$dateofbirth,$gender,$province,$municipality,$zipcode,$barangay,$contactnumber,$institute,$course,$nameofguardian,$number,$address,$id);
                if($result){
                    echo '<script>';
                    echo 'alert("Successfully updated!");';
                    echo 'window.location.href = "../view/students.php";';
                    echo '</script>';
                }else{
                    echo '<script>';
                    echo 'alert("Error!");';
                    echo 'window.location.href = "../view/updatestudent.php";';
                    echo '</script>';
                }

            }


}

if(isset($_POST['deleteStudent'])){
    $id = $_POST['id'];
          

       $qry ="DELETE FROM students WHERE id = '$id'";  

       $result = mysqli_query($conn,$qry);

       
            if(empty($id)){
                 echo "Empty";
            }else{

                
                
                if($result){
                    echo '<script>';
                    echo 'alert("Successfully deleted!");';
                    echo 'window.location.href = "../view/students.php";';
                    echo '</script>';
                }else{
                    echo '<script>';
                    echo 'alert("Error!");';
                    echo 'window.location.href = "../view/deletestudent.php";';
                    echo '</script>';
                }

            }


}






?>