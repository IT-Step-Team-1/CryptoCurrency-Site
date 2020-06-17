<?php

header('HTTP/1.1 200 OK');
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require "Config.php";

$ERROR["status"] 	= "ERROR";
$DONE["status"]		= "DONE";


if ($_POST["pass"] != $passphrase) {
    die(json_encode($ERROR));
}


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die(json_encode($ERROR));
}

$id  = $_POST["id"];
$sql = "UPDATE Transactions SET Status = 1 WHERE ID = $id";

if ($conn->query($sql) === TRUE) {
	
    echo json_encode($DONE);
	
  } else {
	  
    echo json_encode($ERROR);
  }
  
  $conn->close();
  

