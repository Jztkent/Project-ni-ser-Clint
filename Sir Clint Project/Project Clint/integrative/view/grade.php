<?php
include(__DIR__ . "/partial/header.php");
include(__DIR__ . "/partial/nav.php");
?>

<div class="content">
    <h1>Grade</h1>
    <div class="course-content">
        <a href="grade.facultysubject.php">Add Subject to Faculty</a>
        <a href="grade.studentsubject.php">Add Subject to Student</a>
    </div><br>

    <main>
        <h2>Faculty Assign Subjects</h2><br>

        <?php
        include "../Login/database.php";

        // Query to get the count of subjects assigned to each faculty
        $facultySubjectCountQuery = "SELECT faculty, COUNT(subject) AS subject_count FROM faculty_subject GROUP BY faculty";
        $facultySubjectCountResult = mysqli_query($conn, $facultySubjectCountQuery);

        if ($facultySubjectCountResult->num_rows > 0) {
            echo "<div class='box-container'>";
            while ($row = $facultySubjectCountResult->fetch_assoc()) {
                echo "<div class='box faculty-box'>";
                echo "<div class='box-content'>";
                echo "<h3>Faculty: " . $row['faculty'] . "</h3>";
                echo "<p>Subject Count: " . $row['subject_count'] . "</p>";
                echo "</div>";
                echo "</div>";
            }
            echo "</div>";
        } else {
            echo "<p>No Data found.</p>";
        }
        ?>
    </main>
    <h2>Students Assign Subjects</h2><br>
    <form>
        <main>
            <?php
            // Query to get the subjects assigned to each student
            $studentSubjectQuery = "SELECT student, GROUP_CONCAT(faculty SEPARATOR ', ') AS assigned_subjects FROM student_subject GROUP BY student";
            $studentSubjectResult = mysqli_query($conn, $studentSubjectQuery);

            if ($studentSubjectResult->num_rows > 0) {
                echo "<div class='box-container'>";
                while ($row = $studentSubjectResult->fetch_assoc()) {
                    echo "<div class='box student-box'>";
                    echo "<div class='box-content'>";
                    echo "<h3>Student: " . $row['student'] . "</h3>";
                    echo "<p>Assigned Subjects: " . $row['assigned_subjects'] . "</p>";
                    echo "</div>";
                    echo "</div>";
                }
                echo "</div>";
            } else {
                echo "<p>No Data found.</p>";
            }
            ?>
        </main>
    </form>
</div>

<style>
    .box-container {
        display: flex;
        justify-content: space-around;
        margin-bottom: 30px; /* Add a bit more space between box containers */
        flex-wrap: wrap; /* Allow boxes to wrap to the next line */
    }

    .box {
        color: #fff;
        border-radius: 8px;
        padding: 20px;
        width: 300px;
        margin-bottom: 30px; /* Add a bit more margin between boxes */
    }

    .faculty-box {
        background-color: #3498db; /* Blue color for faculty */
        margin-bottom: 15px; /* Add some margin to move faculty boxes down */
    }

    .student-box {
        background-color: #2ecc71; /* Green color for student */
    }

    .box-content {
        text-align: center;
    }
</style>

<?php
include(__DIR__ . "/partial/footer.php");
?>