<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form</title>
    <link rel="stylesheet" href="style.register.css">
</head>

<body>

  <form method="POST" action="register.process.php" name="form1">
    <h1>Create Admin Account</h1>
        
     <div>
        <h3>Username</h3>
        <div>
            <input type="text" name="username"required>
           
        </div>
     </div>

     <div>
        <h3>Password</h3>
        <div>
            <input type="password" name="password" required>
         
        </div>
     </div>
     <div class="links">
        <a href="login.php">Go back to login</a><br>
    </div>
         

    <div>
        <button type="submit">SUBMIT</button>
    </div>
    
</form>
</body>