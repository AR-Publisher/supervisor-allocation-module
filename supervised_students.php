<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Supervised Students</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
    }

    table {
      font-family: Arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    table th,
    table td {
      border: 1px solid #ddd;
      padding: 8px;
    }

    table th {
      background-color: #f2f2f2;
      text-align: left;
    }
  </style>" </head>

<body>
  <h1>Supervised Students</h1>

  <?php
  session_start(); // Start session (optional)

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

  // Get student ID from GET request (if provided)
 $student_id = isset($_GET['student_id']) ? (int)$_GET['student_id'] : null;


  if ($student_id) {
    // Prepare SQL statement to retrieve student information (modify as needed)
    $sql = "SELECT * FROM student_login WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);

    // Bind student ID to the prepared statement
    mysqli_stmt_bind_param($stmt, "i", $student_id);

    // Execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {
      $result = mysqli_stmt_get_result($stmt);

      if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $student_name = $row['username']; // Modify column name as needed
        $student_email = $row['email'];

        echo "<h2>Student Details</h2>";
        echo "<table>
                <tr>
                  <th>Name</th>
                  <td>" . $student_name . "</td>
                </tr>
                <tr>
                  <th>Email</th>
                  <td>" . $student_email . "</td>
                </tr>
              </table>";
      } else {
        echo "No student found with the provided ID.";
      }

      // Close result set and prepared statement
      mysqli_stmt_close($stmt);
      mysqli_free_result($result);
    } else {
      echo "Error retrieving student information: " . mysqli_error($conn);
    }
  } else {
    echo "No student ID provided.";
  }

  // Close connection
  mysqli_close($conn);
  ?>

</body>

</html>
