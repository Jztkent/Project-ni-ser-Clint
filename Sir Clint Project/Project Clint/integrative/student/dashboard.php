<?php
include(__DIR__ . "/partial/header.php");
include(__DIR__ . "/partial/nav.php");
?>

<style>
    .box-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
        margin: 20px;
    }

    .box {
        width: 250px;
        margin: 10px;
        padding: 15px;
        border: 1px solid #ddd;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        text-align: center;
        transition: transform 0.3s; /* Adjusted the transition property */
        cursor: pointer;
    }

    .box:hover {
        transform: scale(1.1); /* Enlarge the box on hover */
    }

    .box h2 {
        color: #3498db;
    }

    .box p {
        margin: 10px 0;
    }
</style>

<div class="content">
    <h1>Sementer Active</h1>
    <div class="course-content">
        <?php
        include "../Login/database.php";

        $qry = "SELECT * FROM schoolyear WHERE status = 'active'";
        $result = mysqli_query($conn, $qry);

        if ($result->num_rows > 0) {
            echo "<div class='box-container'>";

            while ($row = $result->fetch_assoc()) {
                $id = $row['id'];
                echo "<div class='box'>
                        <h2>{$row['schoolyear']}</h2>
                        <p>Semester: {$row['semester']}</p>
                        <p>Status: {$row['status']}</p>
                      </div>";
            }

            echo "</div>"; // Close the box-container
        } else {
            echo "<p>No active school year found.</p>";
        }
        ?>
    </div>
</div>

<?php
include(__DIR__ . "/partial/footer.php");
?>