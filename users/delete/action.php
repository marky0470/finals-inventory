<?php

include_once '../../dbConnection.php';

session_start();
$conn = connect();

if (!isset($_SESSION['user_id'])) {
  echo 'Not authorized';
  return;
}

$id = $_POST['id'];

$sql = "DELETE FROM users WHERE user_id=" . $id;


if ($conn->query($sql) === TRUE) {
  header("Location: ./success.php/");
} else {
  header("Location: ./error.php/");
}


$conn->close();
