<?php

require "Config.php";


$dataSet    = $_POST;
$key        = "PRvAz8tXgpk77dzz";

if (!$dataSet) {
    exit("Error Payment Data");
}

unset($dataSet["ik_sign"]);
ksort($dataSet, SORT_STRING); 
array_push($dataSet, $key); 

$signString     = implode(":", $dataSet); 
$sign           = base64_encode(md5($signString, true)); 

file_put_contents('1Test.txt', '1 ');

if ($sign != $_POST["ik_sign"]) {
    exit("Invalid Sign");
}

file_put_contents('2Test.txt', '2');

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

file_put_contents('3Test.txt', '3 ');

$eth_address    = $_POST["ik_x_Address"];
$value          = floor($_POST["ik_am"]);


$sql = "INSERT INTO Transactions (ETH_Address, Value, Status) VALUES ('{$eth_address}', '{$value}', '0')";

file_put_contents('4Test.txt', '4');

if ($conn->query($sql) === TRUE) {
    echo "Done!";
    $conn->close();
    
    file_put_contents('5Test.txt', '5');

    header("Location: Index.html");
    die();
} 
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    $conn->close();

    file_put_contents('6Test.txt', '6');

    header("Location: Index.html");
    die();
}
      
      