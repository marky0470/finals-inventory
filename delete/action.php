<?php

include_once '../dbConnection.php';

session_start();
$conn = connect();

if (!isset($_SESSION['user_id'])) {
  echo 'Not authorized';
  return;
}

$id = $_POST['id'];

$sql = "DELETE FROM items WHERE item_id=" . $id;


if ($conn->query($sql) === TRUE) {
  include_once '../delete/success.php';
} else {
  include_once '../delete/error.php';
}


$conn->close();
