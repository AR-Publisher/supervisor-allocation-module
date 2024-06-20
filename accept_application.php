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
  // Prepare SQL statement to update application status to 'accepted'
  $sql = "UPDATE application SET status = 'accepted' WHERE id = ?";
  $stmt = mysqli_prepare($conn, $sql);

  // Bind application ID to the prepared statement
  mysqli_stmt_bind_param($stmt, "i", $application_id);

  // Execute the prepared statement
  if (mysqli_stmt_execute($stmt)) {
    echo "Application accepted successfully!";

    // Get student ID from the application (optional)
    $student_id_sql = "SELECT student_id FROM application WHERE id = ?";
    $student_id_stmt = mysqli_prepare($conn, $student_id_sql);
    mysqli_stmt_bind_param($student_id_stmt, "i", $application_id);
    mysqli_stmt_execute($student_id_stmt);
    $result = mysqli_stmt_get_result($student_id_stmt);
    $row = mysqli_fetch_assoc($result);
    $student_id = $row['student_id']; // Assuming a student_id column exists

    // Redirect to supervised students page (optional)
    if ($student_id) {
      header("Location: supervised_students.php?student_id=" . $student_id);
      exit();
    }

    // Close prepared statements (for student ID retrieval)
    mysqli_stmt_close($student_id_stmt);
    mysqli_free_result($result);
  } else {
    echo "Error accepting application: " . mysqli_error($conn);
  }

  // Close prepared statement (for application update)
  mysqli_stmt_close($stmt);
} else {
  echo "Invalid application ID.";
}

// Close connection
mysqli_close($conn);
?>
