<?php

include_once '../dbConnection.php';

$conn = connect();

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username='" . $username . "'";
$result = $conn->query($sql);

$row = $result->fetch_assoc();
$hashedPassword = $row["password"];
$user_id = $row["user_id"];
$username = $row["username"];

if (!$hashedPassword) {
  echo "User does not exist";
  return;
}

if (!password_verify($password, $hashedPassword)) {
  echo "Wrong password";
  return;
}

session_start();
$_SESSION['user_id'] = $user_id;
$_SESSION['username'] = $username;

header("Location: ../inventory/");