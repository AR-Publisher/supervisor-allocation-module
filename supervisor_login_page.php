<?php
session_start();
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM supervisor_login WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION["supervisor_id"] = $row["id"];
        header("Location: supervisor_home_page.php");
        exit;
    } else {
        $login_error = "Invalid username or password";
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
				<input type="text" id="username" name="username" placeholder="username"> <br>
			
				<input type="text" id="password" name="password" placeholder="Password">
				<input style="margin-top: 20px;" type="submit" value="Sign in">

			</form>
			<?php if (isset($login_error)) { echo "<p>$login_error</p>"; } ?>
			<a style="    color: whitesmoke;" href="admin_login_page.php"> <button>Cordinator</button> </a>
			<a style="    color: whitesmoke;" href="student_login_page.php"> <button>Student</button> </a>
			
		</div>
		
	</div>




</body>
</html>
