<?php

include_once '../dbConnection.php';

session_start();
$conn = connect();

if (!isset($_SESSION['clearanceLevel'])) {
  echo 'Not authorized';
  return;
}

if ($_SESSION['clearanceLevel'] != 'admin') {
  echo 'Not authorized';
  return;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>

  <?php include '../components/linkrels.php'; ?>
</head>

<body>

  <?php include '../navbar.php' ?>

  <main class="container">
    <div class="justify-content-center align-items-center">
      <form class="w-50 mt-5 mw-100 mx-auto" method="post" action="action.php">
        <div class="mb-4">
          <h1 class="lh-1">Register</h1>
          <small>Register a new account</small>
        </div>
        <div>
          <label for="username" class="form-label">Username: </label>
          <input type="text" name="username" id="username" class="form-control" required>
        </div>
        <div class="mt-3">
          <label for="password" class="form-label">Password: </label>
          <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <div class="mt-3">
          <label for="clearanceLevel">Clearance Level: </label>
          <select name="clearanceLevel" id="clearanceLevel" class="form-control">
            <option value="admin">Admin</option>
            <option value="staff">Staff</option>
          </select>
        </div>
        <button type="submit" class="mt-3 btn btn-primary">Submit</button>
      </form>
    </div>
  </main>
</body>

</html>