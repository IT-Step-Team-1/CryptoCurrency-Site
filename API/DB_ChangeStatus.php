<?php

require "Config.php";


if ($_GET["pass"] != $passphrase) {
    die("ERROR PASSPHRASE");
}


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$id  = $_GET["id"];
$sql = "UPDATE Transactions SET Status = 1 WHERE ID = $id";

if ($conn->query($sql) === TRUE) {
    echo "DONE!!!";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
  $conn->close();
  

