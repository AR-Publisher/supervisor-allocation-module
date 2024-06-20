<?php
session_start();


$supervisor_id = $_GET['id'];

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

// Query to get supervisor details based on ID
$sql = "SELECT * FROM supervisor WHERE id = ?";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $supervisor_id);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);
  $supervisor_name = $row['name'];
  $supervisor_email = $row['email'];
  $supervisor_specialization = $row['specialization'];
} else {
  echo "Error: Supervisor not found.";
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>

<h1>Edit Supervisor</h1>
<form action="admin_update_supervisor.php" method="post">
  <input type="hidden" name="supervisor_id" value="<?php echo $supervisor_id; ?>">
  <label for="name">Name:</label>
  <input type="text" name="name" id="name" value="<?php echo $supervisor_name; ?>">
  <br>
  <label for="email">Email:</label>
  <input type="email" name="email" id="email" value="<?php echo $supervisor_email; ?>">
  <br>
  <label for="specialization">Specialization:</label>
  <input type="text" name="specialization" id="specialization" value="<?php echo $supervisor_specialization; ?>">
  <br>
  <button type="submit">Update Supervisor</button>
</form>
