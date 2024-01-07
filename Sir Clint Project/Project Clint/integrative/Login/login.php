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
    <form method="POST" action ="login.process.php" name="form1">
    <h1>Login</h1>

    <div> <h3>Email</h3> 
    <div>
        <input type="text" name="username"required>
</div>
    </div>
    <div> <h3>Password</h3>
    <div>
        <input type="password" name="password"required>
    </div>
    </div>
    <div class = "links">
        <a href = "register.php">Create New Account</a>
    </div>
    <button type="submit" name="admin">Login</button>
    <a href = "login.student.php">Login as Student</a><br>
    <a href = "login.faculty.php">Login as Faculty</a>
</form>
</body>
</html>