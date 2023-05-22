<?php

include_once '../../dbConnection.php';

session_start();
$conn = connect();

if (!isset($_SESSION['user_id'])) {
  echo 'Not authorized';
  return;
}

$id = $_POST['id'];
$username = $_POST['username'];
$password = $_POST['password'];
$clearanceLevel = $_POST['clearanceLevel'];

$salt = password_hash($password, PASSWORD_DEFAULT);
$hashedPassword = password_hash($password, PASSWORD_BCRYPT);

$sql = "UPDATE users SET username='" . $username . "', password='" . $hashedPassword . "', clearanceLevel='" . $clearanceLevel . "' WHERE user_id=" . $id;

if ($conn->query($sql) === TRUE) {
  header("Location: ./success.php/");
} else {
  header("Location: ./error.php/");
}


// $conn->close();
