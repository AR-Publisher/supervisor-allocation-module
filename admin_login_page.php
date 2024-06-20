<?php
session_start();
require 'config.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {  // Check if form was submitted using POST method

  $username = $_POST["username"];  // Access username from POST data (assuming input name is "username")

  // Check if password key exists in POST array (optional)
  if (isset($_POST["password"])) {
    $password = $_POST["password"];  // Access password from POST data (assuming input name is "password")
  } else {
    $login_error = "Missing password";  // Add error message if password is missing
  }

  $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";

    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION["admin_id"] = $row["id"];
        header("Location: admin_homepage.php");
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
	
	<title>Login page</title>

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
			<h3>Login as Cordinator</h3>
			<form method="POST">
				<input type="text" name="username" placeholder="Enter Your username" required> <br>
				<input type="Password" name="password" placeholder="Enter Your Password" required>
				<input type="submit" value="Login">

			</form>
			<?php if (isset($login_error)) { echo "<p>$login_error</p>"; } ?>
			<a style="    color: whitesmoke;" href="supervisor_login_page.php" > <button>Supervisor</button> </a>
			<a style="    color: whitesmoke;" href="student_login_page.php"> <button>Student</button> </a>
		</div>
		
	</div>




</body>
</html>
