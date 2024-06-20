<?php
function valid_credentials($username, $password) {
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
  $sql = "SELECT * FROM student_login WHERE username = ? AND password = ?";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param($stmt, "ss", $username, md5($password)); // Hash password before comparison
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);

  if (mysqli_num_rows($result) > 0) {
    mysqli_close($conn);
    return true; // Valid credentials
  } else {
    mysqli_close($conn);
    return false; // Invalid credentials
  }
}

function check_application_status($student_id, $supervisor_id) {
  // Replace with your logic to query the applications table and return status (pending, approved, rejected) or null if no application exists
  // You'll need to connect to the database within this function or use a global connection variable
  // ... (query logic using student_id and supervisor_id)
  require 'config.php';
  if ($application_row) {
    return $application_row['status']; // Assuming 'status' is a column in applications table
  } else {
    return null;
  }
}

?>
