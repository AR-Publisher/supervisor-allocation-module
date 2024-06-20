<?php
  

  // Connect to database (replace with your credentials)
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "allocation";

  $conn = mysqli_connect($servername, $username, $password, $dbname);

  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Check if student ID is set in session
  if (isset($_SESSION['student_id'])) {
    $student_id = $_SESSION['student_id'];
  } else {
    // Handle case where student ID is not set (e.g., redirect to login)
    echo "Error: Student ID not found in session. Please login.";
    exit();
  }

  // Fetch student information from database
  $sql = "SELECT username, registrationno, degree, department, email FROM student_login WHERE id = ?";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param($stmt, "i", $student_id);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);

  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    $student_name = $row["username"];
    $student_registration = $row["registrationno"];
    $student_degree = $row["degree"];
    $student_department = $row["department"];
    $student_email = $row["email"];
  } else {
    echo "Error: Could not retrieve student information.";
  }

  mysqli_close($conn);
?>
