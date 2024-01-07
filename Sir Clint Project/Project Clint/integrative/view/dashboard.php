<?php
include(__DIR__ . "/partial/header.php");
include(__DIR__ . "/partial/nav.php");
include "../Login/database.php";

// Function to get the total count from a query
function getTotalCount($conn, $query)
{
    $result = mysqli_query($conn, $query);
    $totalCount = mysqli_num_rows($result);
    mysqli_free_result($result);
    return $totalCount;
}

// Query for Total Faculty
$totalFacultyQuery = "SELECT * FROM faculty";
$totalFaculty = getTotalCount($conn, $totalFacultyQuery);

// Query for Total Students
$totalStudentsQuery = "SELECT * FROM students";
$totalStudents = getTotalCount($conn, $totalStudentsQuery);

// Query for Total Institutes
$totalInstitutesQuery = "SELECT * FROM institute";
$totalInstitutes = getTotalCount($conn, $totalInstitutesQuery);

// Query for Total Courses
$totalCoursesQuery = "SELECT * FROM course";
$totalCourses = getTotalCount($conn, $totalCoursesQuery);

// Query for Total Subjects
$totalSubjectsQuery = "SELECT * FROM subjects";
$totalSubjects = getTotalCount($conn, $totalSubjectsQuery);

// Query for Total Students in an Institute
$totalStudentsInstituteQuery = "SELECT * FROM faculty";
$totalStudentsInstitute = getTotalCount($conn, $totalStudentsInstituteQuery);

// Query for Total Students in a Course
$totalStudentsCourseQuery = "SELECT * FROM course";
$totalStudentsCourse = getTotalCount($conn, $totalStudentsCourseQuery);

?>

<div class="content">
    <h1>Welcome to the Dashboard!</h1>
    <div class="course-content">
        <div class="stat-box" style="background-color: #3498db; margin-right: 10px;">
            <h2>Total Faculty</h2>
            <p><?php echo $totalFaculty; ?></p>
        </div>
        <div class="stat-box" style="background-color: #2ecc71; margin-right: 10px;">
            <h2>Total Students</h2>
            <p><?php echo $totalStudents; ?></p>
        </div>
        <div class="stat-box" style="background-color: #e74c3c; margin-right: 10px;">
            <h2>Total Institutes</h2>
            <p><?php echo $totalInstitutes; ?></p>
        </div>
        <div class="stat-box" style="background-color: #f39c12; margin-right: 10px;">
            <h2>Total Courses</h2>
            <p><?php echo $totalCourses; ?></p>
        </div>
        <div class="stat-box" style="background-color: #9b59b6; margin-right: 10px;">
            <h2>Total Subjects</h2>
            <p><?php echo $totalSubjects; ?></p>
        </div>
        <div class="stat-box" style="background-color: pink; margin-right: 10px;">
            <h2>Total Students in an Institute</h2>
            <p><?php echo $totalStudentsInstitute; ?></p>
        </div>
        <div class="stat-box" style="background-color: #e67e22;">
            <h2>Total Students in a Course</h2>
            <p><?php echo $totalStudentsCourse; ?></p>
        </div>
    </div>
</div>

<?php
include(__DIR__ . "/partial/footer.php");
?>