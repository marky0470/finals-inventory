<?php

include_once '../dbConnection.php';

session_start();
$conn = connect();

if (!isset($_SESSION['user_id'])) {
  echo 'Not authorized';
  return;
}

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
  <title>Update Item</title>

  <?php include "../components/linkrels.php"; ?>
</head>

<body>

  <?php include "../navbar.php"; ?>

  <?php if ($result->num_rows > 0) : ?>
    <?php $row = $result->fetch_assoc() ?>
    <main class="container py-3">
      <form class="w-50 mw-100 mx-auto pb-5" method="post" action="action.php">
        <div class="mb-4">
          <h1 class="lh-1">Modify Item</h1>
          <small>Update information of the selected Item</small>
        </div>
        <div>
          <label for="id" class="form-label">Item ID: </label>
          <input  style="background-color: #adb5bd;" type="text" name="id" id="id" value='<?php echo $row["item_id"]; ?>' class="form-control" readonly>
        </div>
        <div class="mt-3">
          <label for="name" class="form-label">Item Name: </label>
          <input type="text" name="name" id="name" class="form-control" value='<?php echo $row["name"]; ?>' required>
        </div>
        <div class="mt-3">
          <label for="category" class="form-label">Category: </label>
          <input type="text" name="category" id="category" class="form-control" value='<?php echo $row["category"]; ?>' required>
        </div>
        <div class="mt-3">
          <label for="quantity" class="form-label">Quantity: </label>
          <input type="number" name="quantity" id="quantity" class="form-control" value='<?php echo $row["quantity"]; ?>' required>
        </div>
        <div class="mt-3">
          <label for="price" class="form-label">Price: </label>
          <input type="number" name="price" id="price" class="form-control" value='<?php echo $row["price"] ?>' required>
        </div>
        <div class="mt-3">
          <label for="ceilingPrice" class="form-label">Ceiling Price: </label>
          <input type="number" name="ceilingPrice" id="ceilingPrice" class="form-control" value='<?php echo $row["ceiling_price"] ?>' required>
        </div>
        <div class="mt-3">
          <label for="basePrice" class="form-label">Base Price: </label>
          <input type="number" name="basePrice" id="basePrice" class="form-control" value='<?php echo $row["base_price"]; ?>' required>
        </div>
        <div class="d-block w-100 my-3">
          <button type="submit" class="float-end btn btn-primary">Update</button>
        </div>
      </form>
    </main>
  <?php else : ?>
    <main class="text-center mt-5">
      <h1>Item Not Found</h1>
      <button class="btn btn-outline-primary mt-2" onclick="window.history.back()">Go Back</button>
    </main>
  <?php endif; ?>
</body>

</html>