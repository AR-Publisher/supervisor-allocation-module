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
  if (isset($_SESSION['supervisor_id'])) {
    $supervisor_id = $_SESSION['supervisor_id'];
  } else {
    // Handle case where student ID is not set (e.g., redirect to login)
    echo "Error: Supervisor ID not found in session. Please login.";
    exit();
  }

  // Fetch information from database
  $sql = "SELECT name, position, department, email, specialization FROM supervisor WHERE id = ?";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param($stmt, "i", $supervisor_id);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);

  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    $supervisor_name = $row["name"];
    $supervisor_position = $row["position"];
    $supervisor_specialization = $row["specialization"];
    $supervisor_department = $row["department"];
    $supervisor_email = $row["email"];
  } else {
    echo "Error: Could not retrieve supervisor information.";
  }

  mysqli_close($conn);
?>
