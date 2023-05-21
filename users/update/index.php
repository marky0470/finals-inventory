<?php

include_once '../../dbConnection.php';

session_start();
$conn = connect();

if (!isset($_SESSION['user_id'])) {
  echo 'Not authorized';
  header("Location: /");
  return;
}

$id = $_GET['id'] or null;

if ($id === null) return;

$sql = "SELECT * FROM users WHERE user_id = " . $id;
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update User</title>

  <?php include "../../components/linkrels.php"; ?>
</head>

<body>

  <?php include "../../navbar.php"; ?>

  <?php if ($result->num_rows > 0) : ?>
    <?php $row = $result->fetch_assoc() ?>
    <?php
    $id = $row['user_id'];
    $username = $row['username'];
    $clearanceLevel = $row['clearanceLevel'];
    ?>
    <main class="container">
      <div class="justify-content-center align-items-center">
        <form class="w-50 mt-5 mw-100 mx-auto" method="post" action="action.php">
          <div class="mb-4">
            <h1 class="lh-1">Update User Information</h1>
            <small>Register a new account</small>
          </div>
          <div>
            <label for="id" class="form-label">User ID: </label>
            <input type="text" name="id" id="id" class="form-control" value="<?php echo $id ?>" readonly>
          </div>
          <div class="mt-3">
            <label for="username" class="form-label">Username: </label>
            <input type="text" name="username" id="username" class="form-control" value="<?php echo $username ?>" required>
          </div>
          <div class="mt-3">
            <label for="password" class="form-label">Password: </label>
            <input type="password" name="password" id="password" class="form-control" required>
          </div>
          <div class="mt-3">
            <label for="clearanceLevel">Clearance Level: </label>
            <select name="clearanceLevel" id="clearanceLevel" class="form-control">
              <?php if ($clearanceLevel === "admin") : ?>
                <option value="admin" selected>Admin</option>
              <?php else : ?>
                <option value="admin">Admin</option>
              <?php endif; ?>
              <?php if ($clearanceLevel === "staff") : ?>
                <option value="staff" selected>Staff</option>
              <?php else : ?>
                <option value="staff">Staff</option>
              <?php endif; ?>
            </select>
          </div>
          <button type="submit" class="mt-3 btn btn-primary">Submit</button>
        </form>
      </div>
    </main>
  <?php else : ?>
    <main class="text-center mt-5">
      <h1>User Not Found</h1>
      <button class="btn btn-outline-primary mt-2" onclick="window.history.back()">Go Back</button>
    </main>
  <?php endif; ?>
</body>

</html>