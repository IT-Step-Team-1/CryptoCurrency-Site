<?php

require "Config.php";

if ($_GET["pass"] != $passphrase) {
  die("ERROR PASSPHRASE");
}


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO Transactions (ETH_Address, Value, Status) VALUES ('0xdaskjadsdasjasdad', '100', 'False')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


