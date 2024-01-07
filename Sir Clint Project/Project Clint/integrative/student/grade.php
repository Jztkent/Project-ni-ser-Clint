<?php
include(__DIR__ . "/partial/header.php");
include(__DIR__ . "/partial/nav.php");
?>

<div class="content">
    <h1>Enter The Following to Show Grade</h1>
    <div class="course-content">
        <form method="POST" action="student.process.php" name="form1">

            <div>
                <h3>Student ID and Name</h3>
                <input type="text" name="id_name" placeholder="Ex. 2001-2002 Jan" required>
            </div>

            <div>
                <h3>Enter Faculty Name And Subject</h3>
                <input type="text" name="subject" placeholder="Ex. Libutan ITP 132_Advanced Database" required>
            </div>

            <div class="links">
            </div>

            <button type="submit" name="showgrade">Show Grade</button>

        </form>
    </div>
</div>

<?php
include(__DIR__ . "/partial/footer.php");
?>