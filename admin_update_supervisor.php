<?php
session_start();


$supervisor_id = $_POST['supervisor_id'];
$name = $_POST['name'];
$email = $_POST['email'];
$specialization = $_POST['specialization'];

// Database connection details (replace with your actual details)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "allocation";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Escape user input to prevent SQL injection (optional but recommended)
$name_escaped = mysqli_real_escape_string($conn, $name);
$email_escaped = mysqli_real_escape_string($conn, $email);
$specialization_escaped = mysqli_real_escape_string($conn, $specialization);

// Update supervisor information query
$sql = "UPDATE supervisor SET name = '$name_escaped', email = '$email_escaped', specialization = '$specialization_escaped' WHERE id = $supervisor_id";

if (mysqli_query($conn, $sql)) {
  // Update successful
  echo "Supervisor updated successfully!";
  // Optionally, redirect to a success page or display a success message
} else {
  // Update failed
  echo "Error updating supervisor: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
