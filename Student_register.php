<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["name"];
    $registrationno = $_POST["registrationno"];
    $degree = $_POST["degree"];
    $department = $_POST["department"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "INSERT INTO student_login (username, registrationno, degree, department, email, password) VALUES ('$username', '$registrationno', '$degree', '$department', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        echo "<br><a href='student_login_page.php'>Login Page</a>";
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
	
	<title>Register page</title>

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
			<h3>Register as Student</h3>
			<form method="post">
				<input type="name" id="name" name="name" placeholder="Full Name" required> <br>
				<input type="text" id="registrationno" name="registrationno" placeholder="Registration No" required> <br>
				<input type="text" id="degree" name="degree" placeholder="Your Degree" required><br>
				<input type="text" id="department" name="department" placeholder="Department" required><br>
				<input type="email" id="email" name="email" placeholder="Email" required> <br>
				<input type="Password" id="password" name="password" placeholder="Password" required> <br>
				<input type="submit" value="Sign Up">

			</form>
			<a href=""> <button>Supervisor</button> </a>
			<a href=""> <button>Cordinator</button> </a>
		</div>
		
	</div>




</body>
</html>
