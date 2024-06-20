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

$sql = "SELECT * FROM supervisor";
$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
  echo "<h2>Existing Supervisors</h2>";
  echo "<table>";
  echo "<thead>";
  echo "<tr>";
  echo "<th>ID</th>";
  echo "<th>Position</th>";
  echo "<th>Name</th>";
  echo "<th>Nationality</th>";
  echo "<th>Department</th>";
  echo "<th>Specialization</th>";
  echo "<th>Email</th>";
  echo "<th>Status</th>";
  echo "<th>Edit</th>";
  echo "</tr>";
  echo "</thead>";
  echo "<tbody>";
  while ($row = $result->fetch_assoc()) {

    $supervisor_id = $row['id'];
    $supervisor_name = $row['name'];
    $supervisor_email = $row['email'];
    $supervisor_specialization = $row['specialization']; // Assuming these are relevant columns

    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['position'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['nationality'] . "</td>";
    echo "<td>" . $row['department'] . "</td>";
    echo "<td>" . $row['specialization'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "<td>" . $row['status'] . "</td>";
     echo "<td><a href='admin_edit_supervisor.php?id=$supervisor_id'>Edit</a></td>";  // Add the edit button cell
    echo "</tr>";
  }

  echo "</tbody>";
  echo "</table>";
} else {
  echo "No supervisors found.";
}

mysqli_close($conn);

?>
