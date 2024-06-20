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

// Get student ID from session (or adjust based on your logic)
$student_id = $_SESSION['student_id']; // Assuming student ID is in session

// Get supervisor ID from GET request
$supervisor_id = isset($_GET['supervisor_id']) ? (int)$_GET['supervisor_id'] : null;

$applied = false;
$available_slots = 3; // Maximum applications allowed

if ($student_id && $supervisor_id) {
  // Prepare SQL statement to count accepted applications
  $sql = "SELECT COUNT(*) AS accepted_count FROM application WHERE supervisor_id = ? AND status = 'accepted'";
  $stmt = mysqli_prepare($conn, $sql);

  // Bind supervisor ID to the prepared statement
  mysqli_stmt_bind_param($stmt, "i", $supervisor_id);

  // Execute the prepared statement
  if (mysqli_stmt_execute($stmt)) {
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    $accepted_count = $row['accepted_count'];

    // Check if slots are available (considering accepted applications)
    $available_slots -= $accepted_count;
    if ($available_slots > 0) {
      // Prepare SQL statement to check for existing application from this student
      $sql = "SELECT COUNT(*) AS applied_count FROM application WHERE student_id = ? AND supervisor_id = ?";
      $stmt = mysqli_prepare($conn, $sql);

      // Bind student ID and supervisor ID to the prepared statement
      mysqli_stmt_bind_param($stmt, "ii", $student_id, $supervisor_id);

      // Execute the prepared statement for student application check
      if (mysqli_stmt_execute($stmt)) {
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
        $applied = $row['applied_count'] > 0;
      } else {
        echo "Error checking student application: " . mysqli_error($conn);
      }
    } else {
      $applied = true; // Mark as applied if slots are full (all accepted)
    }

    // Close result sets and prepared statements
    mysqli_stmt_close($stmt);
    mysqli_free_result($result);
  } else {
    echo "Error counting accepted applications: " . mysqli_error($conn);
  }
}

$response = array('applied' => $applied);
echo json_encode($response);

// Close connection
mysqli_close($conn);
