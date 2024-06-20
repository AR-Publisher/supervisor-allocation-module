<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    print_r($_POST);

    $password = $_POST["password"];

    $sql = "INSERT INTO supervisor_login (username, email, password) VALUES ('$username', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        echo "<br><a href='supervisor_login_page.php'>Login Page</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;

    }
}
?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style/login.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
    <title>login page</title>

</head>
<body>

    <div class="navbar">
        <div class="container">
            <div class="title">
                <h3>Supervisor Allocation Module</h3>
            </div>
            
        </div>
    </div>
    <div class="container">
        <div class="logo">
            <img src="logo.png">
            <h3>Login as Supervisor</h3>
            <form method="post">
                <input type="text" id="username" name="username" placeholder="username" required> <br>
                <input type="text" id="email" name="email" placeholder="email" required> <br>
                <input type="password" id="password" name="password" placeholder="password" required><br>
                        <input type="submit" value="Sign in">

            </form>
            <?php if (isset($login_error)) { echo "<p>$login_error</p>"; } ?>
            <a href="loginco.html"> <button>Cordinator</button> </a>
            <a href="loginstu.html"> <button>Student</button> </a>
            <button>Sign In</button>
        </div>
        
    </div>




</body>
</html>
