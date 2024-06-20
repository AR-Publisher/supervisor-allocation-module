<?php

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

$sql = "SELECT * FROM student_login";
$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
  echo "<h2>Existing Students</h2>";
  echo "<table>";
  echo "<thead>";
  echo "<tr>";
  echo "<th>ID</th>";
  echo "<th>username</th>";
  echo "<th>registrationno</th>";
  echo "<th>degree</th>";
  echo "<th>Department</th>";
  echo "<th>Email</th>";
  echo "</tr>";
  echo "</thead>";
  echo "<tbody>";
  while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['username'] . "</td>";
    echo "<td>" . $row['registrationno'] . "</td>";
    echo "<td>" . $row['registrationno'] . "</td>";
    echo "<td>" . $row['department'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "</tr>";
  }
  echo "</tbody>";
  echo "</table>";
} else {
  echo "No students found.";
}

mysqli_close($conn);

?>
