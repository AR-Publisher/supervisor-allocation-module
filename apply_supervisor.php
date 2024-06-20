<?php
session_start();

// ... connect to database (replace with your credentials)

require'config.php';


$student_id = $_SESSION['student_id'];
$supervisor_id = $_POST['supervisor_id'];

// Insert application into database (replace with your query)
$sql = "INSERT INTO applications (student_id, supervisor_id, status) VALUES (?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);
$status = "pending"; // Initial application status
mysqli_stmt_bind_param($stmt, "iii", $student_id, $supervisor_id, $status);
mysqli_stmt_execute($stmt);

if (mysqli_stmt_affected_rows($stmt) > 0) {
  echo "Application submitted successfully!";
} else {
  echo "Error submitting application.";
}

mysqli_close($conn);

?>
