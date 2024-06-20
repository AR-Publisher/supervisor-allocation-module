<?php
session_start();



$servername = "localhost";
$username = "root"; // Replace with a secure password
$password = "";
$dbname = "allocation";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Handle data upload (if any)
if (isset($_POST['upload'])) {
  $file = $_FILES['data_file'];

  // Check if file is uploaded
  if ($file['error'] !== UPLOAD_ERR_OK) {
    echo "Error uploading file: " . $file['error'];
    exit;
  }

  // Validate file type (optional)
  $allowed_extensions = ['csv'];
  $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
  if (!in_array($extension, $allowed_extensions)) {
    echo "Invalid file type. Only CSV files allowed.";
    exit;
  }

  $csv_data = fopen($file['tmp_name'], 'r'); // Open CSV file
  if (!$csv_data) {
    echo "Error opening CSV file.";
    exit;
  }

  // Loop through CSV data 
  while (($row = fgetcsv($csv_data, 1000, ",")) !== FALSE) {
    $student_name = mysqli_real_escape_string($conn, $row[0]); // Assuming data structure
    $student_email = mysqli_real_escape_string($conn, $row[1]);
    $student_password = password_hash($row[2], PASSWORD_DEFAULT); // Hash password

    // Supervisor data (adapt column indices based on your CSV structure)
    $supervisor_name = mysqli_real_escape_string($conn, $row[3]);
    $supervisor_email = mysqli_real_escape_string($conn, $row[4]);
    $supervisor_password = password_hash($row[5], PASSWORD_DEFAULT);

    // Insert student data
    $sql = "INSERT INTO student_login (name, email, password) VALUES ('$student_name', '$student_email', '$student_password')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
      echo "Student added successfully: $student_name <br>";
    } else {
      echo "Error adding student: " . mysqli_error($conn) . "<br>";
    }

    // Insert supervisor data (similar query)
    $sql = "INSERT INTO supervisor_login (name, email, password) VALUES ('$supervisor_name', '$supervisor_email', '$supervisor_password')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
      echo "Supervisor added successfully: $supervisor_name <br>";
    } else {
      echo "Error adding supervisor: " . mysqli_error($conn) . "<br>";
    }
  }

  fclose($csv_data); // Close CSV file
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<body>
  <h2>Admin Panel</h2>
  <form method="post" action="" enctype="multipart/form-data"> <label for="data_file">Upload CSV File:</label>
    <input type="file" name="data_file" accept=".csv" required><br><br>
    <button type="submit" name="upload">Upload Data</button>
  </form>
</body>
</html>
