<?php
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
  </tr>";
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
    <td>" . $row["position"] . "</td>
    <td>" . $row["name"] . "</td>
    <td>" . $row["nationality"] . "</td>
    <td>" . $row["department"] . "</td>
    <td>" . $row["specialization"] . "</td>
    <td>" . $row["email"] . "</td>
    <td>" . $row["status"] . "</td>
  </tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}

mysqli_close($conn);
?>
