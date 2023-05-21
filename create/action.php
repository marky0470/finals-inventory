<?php

include_once '../dbConnection.php';

session_start();
$conn = connect();

if (!isset($_SESSION['user_id'])) {
  echo 'Not authorized';
  return;
}

$name = $_POST['name'];
$category = $_POST['category'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];
$ceilingPrice = $_POST['ceilingPrice'];
$basePrice = $_POST['basePrice'];

$sql = "INSERT INTO items (name, category, quantity, price, ceiling_price, base_price) 
  VALUES ('" . $name . "', '" . $category . "', " . $quantity . ", " . $price . ", " . $ceilingPrice . ", " . $basePrice . ");";


if ($conn->query($sql) === TRUE) {
  include_once '../create/success.php';
} else {
  include_once '../create/error.php';
}


$conn->close();
