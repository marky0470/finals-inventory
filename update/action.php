<?php

include_once '../dbConnection.php';

$conn = connect();

$id = $_POST['id'];
$name = $_POST['name'];
$category = $_POST['category'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];
$ceilingPrice = $_POST['ceilingPrice'];
$basePrice = $_POST['basePrice'];

$sql = "UPDATE items SET name='" . $name . "', category='" . $category . "', quantity=" . $quantity . ", price=" . $price . ", ceiling_price=" . $ceilingPrice . ", base_price=" . $basePrice . " WHERE item_id=" . $id;


if ($conn->query($sql) === TRUE) {
  include_once '../update/success.php';
} else {
  include_once '../update/error.php';
}


// $conn->close();
