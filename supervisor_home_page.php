<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style/student.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	
	<title>Supervisor Home Page</title>

</head>
<body>
	<div class="navbar">
		<div style="display: flex;" class="container">
			<div class="student_page_navbar">
				<img src="logouni.png">
			</div>
			<div class="title">
				<h3>Supervisor Allocation Module : Supervisor</h3>
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
					<h2>Student Requests</h2>
					<p>This section is for supervisor to check the students who applied to be their supervisor</p>
				</div>
				<div class="box_arrow">
					<a href="students_list.php"><img src="arrow.png"> </a>
				</div>
				
				
			</div>
		</div>
	</div>
	<div class="row">
		<div class="container">
			<div class="box">
				<div class="box_child">
					<h2>FYP Proposal Evaluation</h2>
					<p>This section is for supervisor to evaluate the student's proposals on becoming their supervisor </p>
				</div>
				<div class="box_arrow">
					<a href="#"><img src="arrow.png"> </a>
				</div>
				
			</div>
		</div>
	</div>
		
		<div class="row">
		<div class="container">
			<div class="box">
				<div class="box_child">
					<h2>Supervisor Profile</h2>
					<p>This section shows supervisor background</p>
				</div>
				<div class="box_arrow">
					<a href="supervisor_profile.php"><img src="arrow.png"> </a>
				</div>
				
			</div>
		</div>
	</div>
	
</body>
</html>