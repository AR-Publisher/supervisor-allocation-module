<?php
session_start(); // Start session for storing supervisor ID (optional)

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

// Get supervisor ID from session (optional)
$supervisor_id = isset($_SESSION['supervisor_id']) ? $_SESSION['supervisor_id'] : null;

// Prepare SQL statement to retrieve pending applications for the supervisor
$sql = "SELECT a.id AS application_id, sl.username AS student_name, sl.email AS student_email, a.applied_at
FROM application a
INNER JOIN student_login sl ON a.student_id = sl.id
WHERE a.supervisor_id = ? AND a.status = 'pending'
";

$stmt = mysqli_prepare($conn, $sql);

// Bind supervisor ID to the prepared statement (if using session)
if ($supervisor_id) {
  mysqli_stmt_bind_param($stmt, "i", $supervisor_id);
}

// Execute the prepared statement
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

// Check for results
if (mysqli_num_rows($result) > 0) {
  echo "<h2>Pending Applications</h2>";
  echo "<table>
        <tr>
          <th>Student Name</th>
          <th>Email</th>
          <th>Applied At</th>
          <th>Action</th>
        </tr>";

  while ($row = mysqli_fetch_assoc($result)) {
    $application_id = $row['application_id'];
    $student_name = $row['student_name'];
    $student_email = $row['student_email'];
    $applied_at = $row['applied_at'];

    echo "<tr>
          <td>" . $student_name . "</td>
          <td>" . $student_email . "</td>
          <td>" . $applied_at . "</td>
          <td>
            <a href='accept_application.php?id=" . $application_id . "'>Accept</a> /
            <a href='reject_application.php?id=" . $application_id . "'>Reject</a>
          </td>
        </tr>";
  }

  echo "</table>";
} else {
  echo "No pending applications found.";
}

// Close resources
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
