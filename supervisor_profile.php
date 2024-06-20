<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="style/student.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <title>Student Profile</title>
  <style>
    .profile-container {
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 20px;
    width: 30%;
    border-radius: 50px;
    height: auto;
    margin-left: 492px;
    margin-top: 95px;
    }
    .profile-details {
      margin: 10px 0;
    }
    .profile-details label {
      font-weight: bold;
      margin-bottom: 5px;
    }
  </style>
</head>
<body>
    <div class="navbar">
      <div class="container">
        <div class="student_page_navbar">
          <img src="logouni.png">
        </div>
        <div class="title">
          <h2>Supervisor Profile</h2>
        </div>
        
      </div>
    </div>

  <div class="profile-container">
  <?php
    session_start(); // Start session if not already started

    // Check if student ID is set in session
    if (isset($_SESSION['supervisor_id'])) {
      include 'get_supervisor_info.php'; // Include code to fetch student information
    } else {
      echo "Error: Supervisor ID not found in session. Please login.";
      echo "<br><a href='supervisor_login_page.php'>Login Page</a>"; // Link to login page
    }
  ?>

    <div class="profile-details">
      <label for="name">Name:</label>
      <span id="name"><?php echo $supervisor_name; ?></span>
    </div>
    <div class="profile-details">
      <label for="position">Position:</label>
      <span id="position"><?php echo $supervisor_position; ?></span>
    </div>
    <div class="profile-details">
      <label for="specialization">Specialization:</label>
      <span id="specialization"><?php echo $supervisor_specialization; ?></span>
    </div>
    <div class="profile-details">
      <label for="department">Department:</label>
      <span id="department"><?php echo $supervisor_department; ?></span>
    </div>
    <div class="profile-details">
      <label for="email">Email:</label>
      <span id="email"><?php echo $supervisor_email; ?></span>
    </div>
    <div>
    <a style="border: 1px solid #1b9b1b;background-color: #1b9b1b;color: whitesmoke;padding: 5px 5px 5px 5px;float: left;margin-top: 19px;text-decoration: none;" href="logout.php">Logout</a>
  </div>
  </div>
  
</body>
</html>
