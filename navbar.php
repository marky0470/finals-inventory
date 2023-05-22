<?php
if(!isset($_SESSION)) { 
  session_start(); 
} 
?>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
<div class="container-fluid">
  <a class="navbar-brand" href="/">Inventory System</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item mx-3">
        <a class="nav-link" aria-current="page" href="/">Home</a>
      </li>
      <li class="nav-item mx-3">
        <a class="nav-link" href="/inventory">Inventory</a>
      </li>
      <li class="nav-item mx-3">
        <a class="nav-link" href="/create">Create</a>
      </li>
      <li class="nav-item mx-3">
        <a class="nav-link" href="/search?search=">Search</a>
      </li>
      <?php if ($_SESSION["clearanceLevel"] == 'admin') { ?>
      <li class="nav-item mx-3">
        <a class="nav-link" href="/users">User</a>
      </li>
      <?php } ?>
    </ul>
    <ul class="navbar-nav mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link" href="/logout/">Logout</a>
      </li>
    </ul>
  </div>
</div>
</nav>
