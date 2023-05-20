<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Item</title>

  <?php include '../components/linkrels.php'; ?>
</head>

<body>
  <?php include '../navbar.php' ?>

  <main class="container py-3">
    <form class="w-50 mw-100 mx-auto" method="post" action="action.php">
      <div class="mb-4">
        <h1 class="lh-1">Create Item</h1>
        <small>Fill up all the fields to continue</small>
      </div>
      <div>
        <label for="name" class="form-label">Item Name: </label>
        <input type="text" name="name" id="name" class="form-control" required>
      </div>
      <div class="mt-3">
        <label for="category" class="form-label">Category: </label>
        <input type="text" name="category" id="category" class="form-control" required>
      </div>
      <div class="mt-3">
        <label for="quantity" class="form-label">Quantity: </label>
        <input type="number" name="quantity" id="quantity" class="form-control" required>
      </div>
      <div class="mt-3">
        <label for="price" class="form-label">Price: </label>
        <input type="number" name="price" id="price" class="form-control" required>
      </div>
      <div class="mt-3">
        <label for="ceilingPrice" class="form-label">Ceiling Price: </label>
        <input type="number" name="ceilingPrice" id="ceilingPrice" class="form-control" required>
      </div>
      <div class="mt-3">
        <label for="basePrice" class="form-label">Base Price: </label>
        <input type="number" name="basePrice" id="basePrice" class="form-control" required>
      </div>
      <div class="d-block w-100 mt-3">
        <button type="submit" class="float-end btn btn-primary">Submit</button>
      </div>
    </form>
  </main>
</body>

</html>