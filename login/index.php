<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>

  <?php include '../components/linkrels.php'; ?>
</head>

<body>
<main class="container">
  <div class="justify-content-center align-items-center" style="display: flex; height: 100vh;">
    <form class="w-50 mw-100 mx-auto" method="post" action="action.php">
      <div class="mb-4">
        <h1 class="lh-1">Login</h1>
      </div>
      <div>
        <label for="username" class="form-label">username: </label>
        <input type="text" name="username" id="username" class="form-control" required>
      </div>
      <div class="mt-3">
        <label for="password" class="form-label">password: </label>
        <input type="password" name="password" id="password" class="form-control" required>
      </div>
      <button type="submit" class="mt-3 btn btn-primary">Submit</button>  
    </form>
  </div>
</main>
</body>

</html>