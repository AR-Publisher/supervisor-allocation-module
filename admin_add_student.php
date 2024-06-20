<?php
session_start();

// Database connection details
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

// Variables for error messages and success messages
$add_error = '';
$import_error = '';
$success_message = '';

// Handle form submission for adding a supervisor
if (isset($_POST['add_student'])) {
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $registrationno = mysqli_real_escape_string($conn, $_POST['registrationno']);
  $degree = mysqli_real_escape_string($conn, $_POST['degree']);
  $department = mysqli_real_escape_string($conn, $_POST['department']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  // Prepare SQL statement
  $sql = "INSERT INTO student_login (username, registrationno, degree, department, email, password) 
          VALUES (?, ?, ?, ?, ?, ?)";

  $stmt = mysqli_prepare($conn, $sql);

  // Bind parameters
  mysqli_stmt_bind_param($stmt, "ssssss", $username, $registrationno, $degree, $department, $email, $password);

  // Execute the statement
  if (mysqli_stmt_execute($stmt)) {
    $success_message = "Student added successfully.";
  } else {
    $add_error = "Error adding student: " . mysqli_error($conn);
  }

  // Close statement
  mysqli_stmt_close($stmt);
}

// Handle CSV import (optional)
if (isset($_POST['import_csv'])) {
  $csv_file = $_FILES['csv_file'];

  if ($csv_file['error'] === UPLOAD_ERR_OK) {
    $csv_data = array_map('str_getcsv', file($csv_file['tmp_name']));

    // Skip the header row if it exists
    if (isset($csv_data[0]) && in_array(['id', 'username', 'registrationno', 'degree', 'department', 'email', 'password'], $csv_data[0])) {
      array_shift($csv_data);
    }

    $imported = 0;
    $failed = 0;

    foreach ($csv_data as $row) {
      $username = mysqli_real_escape_string($conn, $row[1]);
      $registrationno = mysqli_real_escape_string($conn, $row[2]);
      $degree = mysqli_real_escape_string($conn, $row[3]);
      $department = mysqli_real_escape_string($conn, $row[4]);
      $email = mysqli_real_escape_string($conn, $row[5]);
      $password = mysqli_real_escape_string($conn, $row[6]);

      // Prepare SQL statement
      $sql = "INSERT INTO student_login (username, registrationno, degree, department, email, password) 
              VALUES (?, ?, ?, ?, ?, ?)";

      $stmt = mysqli_prepare($conn, $sql);
      // ... rest of import logic (same as before)
    }
  } else {
    $import_error = "Error uploading CSV file.";
  }

// Add closing curly brace here
}

// Close the connection
mysqli_close($conn);
?>
