<?php

require "API/Config.php";

$email      = $_POST['email'];
$message    = $_POST['message'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO Messages (Email, Message) VALUES ( '{$email}', '{$message}')";

if ($conn->query($sql) === TRUE) {
    header("Location: Index.html");
    $conn->close();
    die();
} 
else {
    echo('Error');
    $conn->close();
    die();
}
