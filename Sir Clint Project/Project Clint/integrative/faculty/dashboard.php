<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .content {
            
            margin: 0 auto;
            padding: 20px;
        }

        .faculty-container {
            display: flex;
            flex-wrap: wrap;
        }

        .faculty-box {
            border: 1px solid #ccc;
            padding: 20px;
            margin: 15px;
            width: 250px;
            background-color: #e0f7fa; /* Light blue background color */
            transition: transform 0.3s;
            cursor: pointer;
        }

        .faculty-box:hover {
            transform: scale(1.05);
        }

        .faculty-box h2 {
            color: #01579b; /* Dark blue text color */
        }

        .student-list {
            list-style: none;
            padding: 0;
        }

        .student-list li {
            margin-bottom: 5px;
        }
    </style>
    <title>Dashboard</title>
</head>
<body>

<?php
include(__DIR__ . "/partial/header.php");
include(__DIR__ . "/partial/nav.php");
include "../Login/database.php";
?>

<main>
    <div class="content">
        <h1>Welcome to the Dashboard!</h1>
        <div class="faculty-container">
            <?php
            $sel = "SELECT faculty, GROUP_CONCAT(student) as students, COUNT(*) as total FROM student_subject GROUP BY faculty";
            $qry = mysqli_query($conn, $sel);

            while ($row = mysqli_fetch_assoc($qry)) {
                echo "<div class='faculty-box'>
                        <h2>{$row['faculty']}</h2>
                        <p>Total Students: {$row['total']}</p>
                        <ul class='student-list'>
                            <li>Students:</li>";

                $students = explode(",", $row['students']);
                foreach ($students as $student) {
                    echo "<li>{$student}</li>";
                }

                echo "</ul></div>";
            }
            ?>
        </div>
    </div>
</main>

<?php
include(__DIR__ . "/partial/footer.php");
?>

</body>
</html>