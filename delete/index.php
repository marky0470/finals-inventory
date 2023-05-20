<?php

include_once "../dbConnection.php";

$conn = connect();

$id = $_GET['id'] or null;

if ($id === null) return;

$sql = "SELECT * FROM items WHERE item_id = " . $id;
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Delete Item</title>
  <?php include "../components/linkrels.php"; ?>
</head>

<body>
  <?php include "../navbar.php"; ?>

  <?php if ($result->num_rows > 0) : ?>
    <main class="container d-flex align-items-center justify-content-center">
      <form action="action.php" class="w-50 mt-5" method="post">
        <?php $row = $result->fetch_assoc() ?>
        <p>Are you sure you want to delete this Item?</p>
        <div>
          <label for="id" class="form-label">ID: </label>
          <input name="id" id="id" class="form-control" value='<?php echo $row["item_id"] ?>' readonly />
        </div>
        <div class="mt-4">
          <label for="name" class="form-label">Name: </label>
          <input name="name" id="name" class="form-control" value='<?php echo $row["name"] ?>' readonly />
        </div>
        <div class="d-block w-100 mt-5">
          <button type="submit" class="float-end btn btn-danger px-5">Delete</button>
          <button type="button" class="float-end btn btn-text mx-4" onclick="window.history.back()">Cancel</button>
        </div>
      </form>
    </main>
  <?php else : ?>
    <main class="text-center mt-5">
      <h1 class="">Item Not Found!</h1>
      <button class="btn btn-outline-primary mt-2" onclick="window.history.back()">Go Back</button>
    </main>
  <?php endif; ?>

</body>

</html>