<?php
session_start(); // Start session for storing application status

// Database connection details (replace with your credentials)
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

// Get student ID from session (assuming student is logged in)
$student_id = isset($_SESSION['student_id']) ? $_SESSION['student_id'] : null;

// Check if valid supervisor ID is sent via POST
if (isset($_POST['supervisor_id']) && is_numeric($_POST['supervisor_id'])) {
  $supervisor_id = (int)$_POST['supervisor_id']; // Convert to integer

  // Prepare SQL statement for application insertion
  $sql = "INSERT INTO application (student_id, supervisor_id, applied_at, status)
          VALUES (?, ?, NOW(), 'pending')";

  $stmt = mysqli_prepare($conn, $sql);

  // Bind student ID and supervisor ID to the prepared statement
  mysqli_stmt_bind_param($stmt, "ii", $student_id, $supervisor_id);

  // Execute the prepared statement
  if (mysqli_stmt_execute($stmt)) {
    $response = array("success" => true);
    echo json_encode($response);
  } else {
    $response = array("success" => false, "message" => "Error submitting application: " . mysqli_error($conn));
    echo json_encode($response);
  }

  // Close prepared statement
  mysqli_stmt_close($stmt);
} else {
  $response = array("success" => false, "message" => "Invalid supervisor ID");
  echo json_encode($response);
}

// Close connection
mysqli_close($conn);
