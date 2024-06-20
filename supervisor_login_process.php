<?php
session_start();

// ... other code



// Connect to database (replace with your credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "supervisor_list";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Prepare SQL statement to prevent SQL injection
$sql = "SELECT * FROM supervisor_login WHERE username = ? AND password = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ss", $username, md5($password)); // Hash password before comparison
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) > 0) {
  // Valid credentials
  $row = mysqli_fetch_assoc($result);
  $student_id = $row["id"];

  $_SESSION['supervisor_id'] = $supervisor_id;

  header("Location: supervisor_home_page.php");
} else {
  // Invalid credentials
  echo "Invalid name or password.";
}

mysqli_close($conn); // Close connection only if successful
?>
