<?php
include(__DIR__  . "/partial/header.php");
include(__DIR__  . "/partial/nav.php");
?>
<div class="content">
    <h1>Search Result</h1>
</div>
<form class="form1">
<style>
        .form1{
  position: absolute;
  top: 23%;
  left: 23%;
}

    </style>
</form>
<?php

include "../Login/database.php";

// Process the search query
if (isset($_GET['query'])) {
$searchQuery = $_GET['query'];

// Use the search query in your SQL query
$sql = "SELECT * FROM student_grade WHERE id LIKE '%$searchQuery%'";
$result = $conn->query($sql);

// Display search results

if(empty($searchQuery)){
echo '<script>
window.location.href= "students.php";
alert("Text Field Is Empty.") 
  </script>
"';
  }else{
if ($result->num_rows > 0) {
  echo "<div class='table-container'>";
  echo "<table border='1'>
  <tr >
  <th>Student Id and Name</th>
                <th>Course</th>
                <th>Section and Year</th>
                <th>Subject</th>
                <th>Time</th>
                <th>Grade</th>
  </tr>";
  while ($row = $result->fetch_assoc()) {
      // Output or format the search results as needed
      echo "<tr>
      <td>" . $row['id_name'] . "</td>
      <td>" . $row['course'] . "</td>
      <td>" . $row['sectionandyear'] . "</td>
      <td>" . $row['subject'] . "</td>
      <td>" . $row['time'] . "</td>
      <td>" . $row['grade'] . "</td>
    
  </tr>";
 
  }
} else {
  echo '<script>
  window.location.href= "grade.php";
   alert("The Id Number Did Not Exist.")
 </script>
  "';
}
}
// Free the result set
$result->free_result();
}

// Close the database connection
$conn->close();
?>
</body>
</html>