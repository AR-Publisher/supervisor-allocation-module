<?php
session_start();
if (!isset($_SESSION["student_id"])) {
    header("Location: student_login_page.php");
    exit;
}

require 'config.php';

$student_id = $_SESSION["student_id"];
$sql = "SELECT * FROM student_login WHERE id='$student_id'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    echo "Welcome, " . $row["username"] . "!<br>";
    // Display other student information here
} else {
    echo "Error fetching student information";
}
?>


<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style/student.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	
	<title>Student Home Page</title>

</head>
<body>
	<div class="navbar">
		<div style="display: flex;" class="container">
			<div class="student_page_navbar">
				<img src="logouni.png">
			</div>
			<div class="title">
				<h3>Supervisor Allocation Module : Student</h3>
			</div>
			<div>
  				<a style="border: 1px solid whitesmoke;color: whitesmoke;padding: 5px 5px 5px 5px;float: left;margin-left: 265px;margin-top: 19px;text-decoration: none;" href="logout.php">Logout</a>
			</div>
			
		</div>
	</div>

	<div class="row">
		<div class="container">
			<div class="box">
				<div class="box_child">
					<h2>Supervisor List</h2>
					<p>This section is for students to check the supervisors avaialable in department</p>
				</div>
				<div class="box_arrow">
					<a  href="supervisor's_list_page.php"><img src="arrow.png"> </a>
				</div>
				
			</div>
		</div>
	</div>
	<div class="row">
		<div class="container">
			<div class="box">
				<div class="box_child">
					<h2>Qouta</h2>
					<p>This section is for students to check the supervisors avaialable in department</p>
				</div>
				<div class="box_arrow">
					<a href="Qouta.php"><img src="arrow.png"> </a>
				</div>
				
			</div>
		</div>
	</div>
		<div class="row">
		<div class="container">
			<div class="box">
				<div class="box_child">
					<h2>Supervisor Recommendation</h2>
					<p>This section is for students to check the supervisors avaialable in department</p>
				</div>
				<div class="box_arrow">
					<a href="supervisor_recommendation.php"><img src="arrow.png"> </a>
				</div>
				
			</div>
		</div>
	</div>
		<div class="row">
		<div class="container">
			<div class="box">
				<div class="box_child">
					<h2>Student Profile</h2>
					<p>This section is for students to check the supervisors avaialable in department</p>
				</div>
				<div class="box_arrow">
					<a href="student_profile.php"><img src="arrow.png"> </a>
				</div>
				
			</div>
		</div>
	</div>
	
</body>
</html>