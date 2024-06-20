<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="style/student.css">
  <title>Supervisor List</title>
  <style>
    table {
      border-collapse: collapse;
      width: 100%;
    }
    th, td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }
    th {
      background-color: #f1f1f1;
    }
    .success {
      color: green;
    }
    .error {
      color: red;
    }
  </style>
</head>
<body>

<?php
// Include error handling and supervisor retrieval (replace with actual logic)
include 'admin_add_supervisor.php';

// Display error messages if any
if ($add_error): ?>
  <p class="error"><?php echo $add_error; ?></p>
<?php endif; ?>
<?php if ($import_error): ?>
  <p class="error"><?php echo $import_error; ?></p>
<?php endif; ?>


<?php if ($success_message): ?>
  <p class="success"><?php echo $success_message; ?></p>
<?php endif; ?>
<div class="navbar">
    <div style="display: flex;" class="container">
      <div class="student_page_navbar">
        <img src="logouni.png">
      </div>
      <div class="title">
        <h3 style="margin-top: 21px;
    font-size: 26px;
    font-weight: 600;">Supervisor Allocation Module : Supervisor List</h3>
      </div>
      <div>
          <a style="border: 1px solid whitesmoke;color: whitesmoke;padding: 5px 5px 5px 5px;float: left;margin-left: 265px;margin-top: 19px;text-decoration: none;" href="logout.php">Logout</a>
      </div>
      
    </div>
</div>


<div style="width: 100%; display: flex;">
  <form style="width: 50%; margin-top:20px;
    display: block;" method="post" action="">
    <h2 style="text-align: center;
    font-size: 25px;">Import Students (Manually)</h2>
    <div style="display: flex;
    flex-direction: column;
    align-items: center;    margin-top: 33px;">
      <label style="    font-size: 20px;" for="position">Position:</label>
      <input style="font-size: 20px;" type="text" name="position" id="position" required>
    </div>
    <div style="display: flex;
    flex-direction: column;
    align-items: center;">
      <label style="    font-size: 20px;" for="name">Name:</label>
      <input style="font-size: 20px;" type="text" name="name" id="name" required>
    </div>
    <div style="display: flex;
    flex-direction: column;
    align-items: center;">
      <label style="    font-size: 20px;" for="nationality">Nationality:</label>
      <input style="font-size: 20px;" type="text" name="nationality" id="nationality">
    </div>
    <div style="display: flex;
    flex-direction: column;
    align-items: center;">
      <label style="    font-size: 20px;" for="department">Department:</label>
      <input style="font-size: 20px;" type="text" name="department" id="department" required>
    </div>
    <div style="display: flex;
    flex-direction: column;
    align-items: center;">
      <label style="    font-size: 20px;" for="specialization">Specialization:</label>
      <input style="font-size: 20px;" type="text" name="specialization" id="specialization">
    </div>
    <div style="display: flex;
    flex-direction: column;
    align-items: center;">
      <label style="    font-size: 20px;" for="email">Email:</label>
      <input style="font-size: 20px;" type="email" name="email" id="email" required>
    </div>
    <div style="display: flex;
    flex-direction: column;
    align-items: center;">
      <label style="    font-size: 20px;" for="status">Status:</label>
      <input style="font-size: 20px;" type="text" name="status" id="status">
    </div>
    <div style="display: flex;
    flex-direction: column;
    align-items: center;">
      <button style="width: 134px;
    height: 30px;
    font-size: large;
    background-color: #1b9b1b;
    border: none;
    margin-top: 20px;
    border-radius: 5px;" type="submit" name="add_supervisor">Add Supervisor</button>
    </div>
  </form>
  

<div style=" display: block;
    margin-top: 25px;
    margin-left: 132px;
    text-align: center;">
  <h2>Import Supervisors (CSV)</h2>

  <form method="post" action="" enctype="multipart/form-data">
    <div style="margin-top: 22px;">
      <label style="margin-left: 96px;" for="csv_file">CSV File:</label>
      <input style="" type="file" type="file" name="csv_file" id="csv_file" accept=".csv">
    </div>
    <div>
      <button style="background-color: #1b9b1b; border:none;margin-top: 50px;
    height: 28px;
    border-radius: 6px;
    font-size: 15px;
    font-weight: 700;" type="submit" name="import_csv">Import CSV</button>
    </div>
  </form>
</div>
</div>

<?php
// Include logic for displaying existing supervisors (replace with actual logic)
// This could be a separate function or included from another file
include 'display_existing_supervisors.php';
?>


</body>
</html>
