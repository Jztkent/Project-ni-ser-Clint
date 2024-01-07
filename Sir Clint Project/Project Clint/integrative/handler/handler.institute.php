<?php

$db_servername = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "client";

$conn = new mysqli($db_servername, $db_username, $db_password, $db_name);

if ($conn->connect_error) {
    die("Connection error: " . $conn->connect_error);
}

class InstituteModel
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function InsertInstitute($instituteName, $insdescription)
    {
        $stmt = $this->conn->prepare("INSERT INTO institute (institute, description) VALUES (?, ?)");

        // Check if the prepare statement is successful
        if (!$stmt) {
            die("Error in prepare statement: " . $this->conn->error);
        }

        $stmt->bind_param("ss", $instituteName, $insdescription);

        // Check if the bind_param is successful
        if (!$stmt->execute()) {
            die("Error in execution: " . $stmt->error);
        }

        $stmt->close();
        return true;
    }

    public function UpdateInstitute($instituteName, $insdescription, $instituteId)
    {
        $stmt = $this->conn->prepare("UPDATE institute SET institute = ?, description = ? WHERE id_institute = ?");

        // Check if the prepare statement is successful
        if (!$stmt) {
            die("Error in prepare statement: " . $this->conn->error);
        }

        $stmt->bind_param("ssi", $instituteName, $insdescription, $instituteId); // "ssi" indicates two parameters: string and integer

        // Check if the bind_param is successful
        if (!$stmt->execute()) {
            die("Error in execution: " . $stmt->error);
        }

        $stmt->close();
        return true;
    }

    public function DeleteInstitute($instituteId)
    {
        $stmt = $this->conn->prepare("DELETE FROM institute WHERE id_institute = ?");

        // Check if the prepare statement is successful
        if (!$stmt) {
            die("Error in prepare statement: " . $this->conn->error);
        }

        $stmt->bind_param("i", $instituteId); // "i" indicates that $instituteId is an integer

        // Check if the bind_param is successful
        if (!$stmt->execute()) {
            die("Error in execution: " . $stmt->error);
        }

        $stmt->close();
        return true;
    }
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if (isset($_POST["hidden_method"])) {
        if ($_POST["hidden_method"] == "update") {
            $instituteName = $_POST['institute'];
            $insdescription = $_POST['description'];
            $instituteId = $_POST["id_institute"];
            $instituteModel = new InstituteModel($conn);

            $updateResult = $instituteModel->UpdateInstitute($instituteName, $insdescription, $instituteId);
            if ($updateResult) {
                echo '<script>';
                echo 'alert("Successfully updated!");';
                echo 'window.location.href = "../view/institute.php";';
                echo '</script>';
            } else {
                echo "Error updating institute";
            }
        } else if ($_POST["hidden_method"] == "delete") {
            $instituteId = $_POST["id"];
            $instituteModel = new InstituteModel($conn);

            $deleteResult = $instituteModel->DeleteInstitute($instituteId);
            if ($deleteResult) {
                echo '<script>';
                echo 'alert("Successfully deleted!");';
                echo 'window.location.href = "../view/institute.php";';
                echo '</script>';
            } else {
                echo "Error deleting institute";
            }
        } else {
            $instituteName = $_POST['institute'];
            $insdescription = $_POST['description'];
            $instituteModel = new InstituteModel($conn);

            if (empty($instituteName)) {
                echo "Blank";
            } else {
                $insertResult = $instituteModel->InsertInstitute($instituteName, $insdescription);

                if ($insertResult) {
                    echo '<script>';
                    echo 'alert("Successfully added!");';
                    echo 'window.location.href = "../view/institute.php";';
                    echo '</script>';
                } else {
                    echo "Error inserting institute";
                }
            }
        }
    }
}
?>