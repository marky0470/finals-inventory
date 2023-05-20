<?php

echo '
  <html>
    <head>
      <?php include "../components/linkrels.php" ?>
    </head>
    <body>
      <?php include "../navbar.php" ?>

      <main class="container">
        <h1>Successfully updated item information!</h1>
        <a href="/inventory">
          <button class="btn btn-outline-primary">See Inventory</button>
        </a>
      </main>
    </body>
  </html>
  ';
