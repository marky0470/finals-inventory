<?php

include_once '../dbConnection.php';

session_start();
$conn = connect();

if (!isset($_SESSION['user_id'])) {
  echo 'Not authorized';
  return;
}

$id = $_POST['id'];
$name = $_POST['name'];
$category = $_POST['category'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];
$ceilingPrice = $_POST['ceilingPrice'];
$basePrice = $_POST['basePrice'];

$sql = "UPDATE items SET name='" . $name . "', category='" . $category . "', quantity=" . $quantity . ", price=" . $price . ", ceiling_price=" . $ceilingPrice . ", base_price=" . $basePrice . " WHERE item_id=" . $id;


if ($conn->query($sql) === TRUE) {
  header("Location: ./success.php/");
} else {
  header("Location: ./error.php/");
}


// $conn->close();
