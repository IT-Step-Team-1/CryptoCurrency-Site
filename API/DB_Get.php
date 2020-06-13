<?php

header('HTTP/1.1 200 OK');
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require "Config.php";

$ERROR["status"] 	= "ERROR";
$DONE["status"]		= "DONE";
$NONE["status"]   = "NONE";


if ($_GET["pass"] != $passphrase) {
    die(json_encode($ERROR, JSON_UNESCAPED_UNICODE));
}


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die(json_encode($ERROR, JSON_UNESCAPED_UNICODE));
}


$sql = "SELECT ID, ETH_Address, Value, Status FROM Transactions";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
	
    $data["status"] = "DONE";

    while($row = $result->fetch_assoc()) {
        $data["data"][$row["ID"]] = [   "ETH_Address"    => $row["ETH_Address"], 
                                        "Value"         => $row["Value"], 
                                        "Status"        => $row["Status"],
                                    ];
    }
    
    echo(json_encode($data, JSON_UNESCAPED_UNICODE));

  } 
  else {
	  
    echo(json_encode($NONE, JSON_UNESCAPED_UNICODE));
  }
  

