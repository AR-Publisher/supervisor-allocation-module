<?php
session_start(); // Start session for storing application status

$servername = "localhost";
$username = "root";
$password = ""; // Replace with a secure password
$dbname = "allocation";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM qouta";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  echo "<table>
  <tr>
    <th>Position</th>
    <th>Name</th>
    <th>Nationality</th>
    <th>Department</th>
    <th>Specialization</th>
    <th>Email</th>
    <th>Status</th>
    <th>Apply</th>
  </tr>";

  // Output data of each row
  while ($row = mysqli_fetch_assoc($result)) {
    $supervisor_id = $row["id"]; // Store supervisor ID securely

    // Check if student has already applied (using session)
    $applied = isset($_SESSION["applied_supervisors"][$supervisor_id]) ? true : false;

    $applied_text = $applied ? "Applied" : "Apply";
    $apply_button = "<button " . ($applied ? "disabled" : "") . " onclick=\"applySupervisor($supervisor_id)\">".$applied_text."</button>";

    echo "<tr>
      <td>" . $row["position"] . "</td>
      <td>" . $row["name"] . "</td>
      <td>" . $row["nationality"] . "</td>
      <td>" . $row["department"] . "</td>
      <td>" . $row["specialization"] . "</td>
      <td>" . $row["email"] . "</td>
      <td>" . $row["status"] . "</td>
      <td>" . $apply_button . "</td>
    </tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}

mysqli_close($conn);

// JavaScript function for applying to a supervisor (assuming separate apply.php)
?>
<script>
function applySupervisor(supervisorId) {
  // Use AJAX or form submission to send data to apply.php
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "apply.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onload = function() {
    if (xhr.status === 200) {
      // Update button text and session data based on response
      var response = JSON.parse(xhr.responseText);
      if (response.success) {
        document.getElementById("applyButton-" + supervisorId).innerText = "Applied";
        document.getElementById("applyButton-" + supervisorId).disabled = true;
        $_SESSION["applied_supervisors"][supervisorId] = true;
      } else {
        alert("Application failed: " + response.message);
      }
    } else {
      alert("Error applying to supervisor: " + xhr.statusText);
    }
  };
  xhr.onerror = function() {
    alert("Network error");
  };
  xhr.send("supervisor_id=" + supervisorId);
}
</script>
