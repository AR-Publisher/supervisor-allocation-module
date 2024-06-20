<?php
session_start(); // Start session (optional)

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

// Get application ID from GET request
$application_id = isset($_GET['id']) ? (int)$_GET['id'] : null;

if ($application_id) {
  // Prepare SQL statement to update application status to 'rejected'
  $sql = "UPDATE application SET status = 'rejected' WHERE id = ?";
  $stmt = mysqli_prepare($conn, $sql);

  // Bind application ID to the prepared statement
  mysqli_stmt_bind_param($stmt, "i", $application_id);

  // Execute the prepared statement
  if (mysqli_stmt_execute($stmt)) {
    echo "Application rejected successfully!";

    // Optional: Send notification to student (implement logic based on your system)
  } else {
    echo "Error rejecting application: " . mysqli_error($conn);
  }

  // Close prepared statement
  mysqli_stmt_close($stmt);
} else {
  echo "Invalid application ID.";
}

// Close connection
mysqli_close($conn);
?>
