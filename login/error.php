<?php

?>

<html>
  <head>
    <?php include "../components/linkrels.php" ?>
  </head>
  <body>
    <main class="container justify-content-center" style="display: flex; flex-direction: column; height: 100vh;">
      <?php if ($_GET): ?>
        <h1>Login failed</h1>
        <h3><?php echo $_GET['error']; ?></h3>
      <?php endif; ?>
      <a href=".">
        <button class="btn btn-outline-primary">Back</button>
      </a>
    </main>
  </body>
</html>

