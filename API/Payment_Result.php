<?php

require "Config.php";


$dataSet    = $_POST;
$key        = "PRvAz8tXgpk77dzz";

if (!$dataSet) {
    die("Error Payment Data");
}

if ($dataSet["ik_inv_st"] === "fail") {
    die("Error Status");
}

unset($dataSet["ik_sign"]);
ksort($dataSet, SORT_STRING); 
array_push($dataSet, $key); 

$signString     = implode(":", $dataSet); 
$sign           = base64_encode(md5($signString, true)); 


if ($sign != $_POST["ik_sign"]) {
    exit("Invalid Sign");
}

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$eth_address    = $_POST["ik_x_Address"];
$value          = $_POST["ik_x_Tokens"];
$p_id           = $_POST["ik_pm_no"];


$sql = "INSERT INTO Transactions (ETH_Address, Value, Status, Payment_ID) VALUES ('{$eth_address}', '{$value}', '0', {$p_id})";


if ($conn->query($sql) === TRUE) {
    echo "Done!";
    $conn->close();
    
    die();
} 
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    $conn->close();

    die();
}
      
      