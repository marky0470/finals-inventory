<?php

include_once '../dbConnection.php';

session_start();
$conn = connect();

if (!isset($_SESSION['user_id'])) {
  echo 'Not authorized';
  return;
}

$sql = "SELECT * FROM items;";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inventory Page</title>

  <?php include "../components/linkrels.php"; ?>
</head>

<body>

  <?php include "../navbar.php"; ?>

  <main class="container">
    <?php if ($result->num_rows > 0) : ?>
      <table class="table table-striped text-center mt-4">
        <thead>
          <tr>
            <th scope="col">Item No.</th>
            <th scope="col">Name</th>
            <th scope="col">Category</th>
            <th scope="col">Quantity</th>
            <th scope="col">Price</th>
            <th scope="col">Ceiling Price</th>
            <th scope="col">Base Price</th>
            <?php if ($_SESSION['clearanceLevel'] == 'admin') { echo '<th scope="col">Actions</th>'; } ?>
          </tr>
        </thead>
        <tbody>
          <?php
          while ($row = $result->fetch_assoc()) {
            $id = $row['item_id'];
            echo "<tr>";
            foreach ($row as $field => $value) {
              echo "<td>" . $value . "</td>";
            }
            if ($_SESSION['clearanceLevel'] == 'admin') {
            echo "<td>
              <div class='btn-group'>
                <a href='/update?id=$id' class='btn btn-sm btn-warning'>
                  <button class='btn btn-sm btn-warning'>Modify</button>
                </a>
                <a href='/delete?id=$id' class='btn btn-sm btn-danger'>
                  <button class='btn btn-sm btn-danger'>Delete</button>
                </a>
              </div>
              </td>";
            }
            echo "</tr>";
          }
          ?>
        </tbody>
      </table>
    <?php else : ?>
      <p>No Items in the Inventory</p>
    <?php endif; ?>

  </main>
</body>

</html>