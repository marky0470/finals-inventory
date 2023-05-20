<?php

// THIS IS THE DATABASE CONNECTION FILE

function connect() {
  
  $dbhost = "localhost";
  $dbuser = "root";
  $dbpass = "";
  $db = "inventory";
  $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
  
  return $conn;
}
