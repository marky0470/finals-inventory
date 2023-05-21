<?php

include_once '../dbConnection.php';

$conn = connect();

$username = $_POST['username'];
$password = $_POST['password'];

$salt = password_hash($password, PASSWORD_DEFAULT);
$hashedPassword = password_hash($password, PASSWORD_BCRYPT);

$sql = "SELECT username FROM users WHERE username='" . $username . "'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  echo "User already exists";
  return;
}

$sql = "INSERT INTO users (username, password) 
  VALUES ('" . $username . "', '" . $hashedPassword . "');";

if ($conn->query($sql) === TRUE) {
  header("Location: ../login/");
} else {
  include_once '/error.php';
}

$conn->close();