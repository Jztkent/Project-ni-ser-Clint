<?php
// Load the database configuration file 
include "../Login/database.php";
 
// Filter the excel data 
function filterData(&$str) { 
    $str = preg_replace("/\t/", "\\t", $str); 
    $str = preg_replace("/\r?\n/", "\\n", $str); 
    if (strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"'; 
} 

// Excel file name for download 
$fileName = "members-data_" . date('Y-m-d') . ".xls"; 

// Column names 
$fields = array('STUDENT ID NAME', 'COURSE', 'SECTIONYEARLEVEL', 'SUBJECT', 'TIME', 'GRADE', 'RESULT'); 

// Display column names as the first row 
$excelData = implode("\t", array_values($fields)) . "\n"; 

// Fetch records from the database 
$query = $conn->query("SELECT * FROM student_grade"); 

if ($query->num_rows > 0) { 
    // Output each row of the data 
    while ($row = $query->fetch_assoc()) { 
        $grade = $row['grade'];
        $result = ($grade >= 1 && $grade <= 3) ? 'Pass' : 'Fail';

        $lineData = array($row['id_name'], $row['course'], $row['sectionandyear'], $row['subject'], $row['time'], $grade, $result); 
        array_walk($lineData, 'filterData'); 
        $excelData .= implode("\t", array_values($lineData)) . "\n"; 
    } 
} else { 
    $excelData .= 'No records found...' . "\n"; 
} 

// Headers for download 
header("Content-Type: application/vnd.ms-excel"); 
header("Content-Disposition: attachment; filename=\"$fileName\""); 
 
// Render excel data 
echo $excelData; 
exit;
?>