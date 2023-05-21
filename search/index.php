<?php

include_once '../dbConnection.php';

session_start();
$conn = connect();

if (!isset($_SESSION['user_id'])) {
  echo 'Not authorized';
  return;
}

$search = $_GET['search'] or null;

?>

<?php if ($search === null) : ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Item</title>

    <?php include "../components/linkrels.php" ?>
  </head>

  <body>
    <?php include "../navbar.php" ?>

    <main class="container">
      <form action="" class="w-50 mx-auto mt-5 d-block py-5" method="get">
        <label for="search">Search Item: </label>
        <input type="text" class="form-control" name="search" id="search" />
        <button class="btn btn-primary w-100 mt-4 py-2">Search</button>
      </form>
    </main>

  </body>

  </html>

<?php else : ?>

  <?php

  $sql = "SELECT * FROM items WHERE name LIKE '%" . $search . "%'";
  $result = $conn->query($sql);

  ?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Item</title>

    <?php include "../components/linkrels.php" ?>
  </head>

  <body>
    <?php include "../navbar.php" ?>

    <main class="container">
      <form action="" class="w-50 mx-auto mt-5 d-block py-5" method="get">
        <label for="search">Search Item: </label>
        <input type="text" class="form-control" name="search" id="search" />
        <button class="btn btn-primary w-100 mt-4 py-2">Search</button>
      </form>

      <section>
        <p>Search: <?php echo $search ?></p>
      </section>

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
              <th scope="col">Actions</th>
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
              echo "</tr>";
            }
            ?>
          </tbody>
        </table>
      <?php else : ?>
        <section class="text-center">
          <p>No Items found</p>
        </section>
      <?php endif; ?>
    </main>

  </body>

  </html>
<?php endif; ?>