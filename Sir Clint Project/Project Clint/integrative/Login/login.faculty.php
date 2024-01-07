<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.login.css">
    <script>
        <?php
        session_start();
        if (isset($_SESSION['registration_success']) && $_SESSION['registration_success']) {
            echo 'alert("Account created successfully!");';
            unset($_SESSION['registration_success']);
        }
        ?>
    </script>
</head>
<body>
    <form method="POST" action ="login.process.faculty.php" name="form1">
    <h1>Login As Faculty</h1>

    <div> <h3>Email</h3> 
    <div>
        <input type="text" name="id"required>
</div>
    </div>
    <div> <h3>Password</h3>
    <div>
        <input type="password" name="dbirth"required>
    </div>
    </div>
    <div class = "links">
        <a href = "login.php">Go Back</a>
    </div>
    <button type="submit" name="faculty">Login</button>
</form>
</body>
</html>