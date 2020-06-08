<?php

require "Config.php";


if ($_GET["pass"] != $passphrase) {
    die("ERROR PASSPHRASE");
}

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT ID, ETH_Adress, Value, Status FROM Transactions";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $data = NULL;

    while($row = $result->fetch_assoc()) {
        $data[$row["ID"]] = [   "ETH_Adress"    => $row["ETH_Adress"], 
                                "Value"         => $row["Value"], 
                                "Status"        => $row["Status"]
                            ];
    }
    
    echo("<pre style='word-wrap: break-word; white-space: pre-wrap;'>". json_encode($data). "</pre>");

  } 
  else {
    echo("0 results");
  }
  

