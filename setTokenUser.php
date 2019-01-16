<?php
$servername = "localhost";
$username = "yassine";
$password = "";
$dbname = "aaweni";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$idUser = $_GET['userID'];
$token = $_GET['token'];
$conn->query($sql);
$sql = "UPDATE tokens SET idUser=".$idUser." WHERE token='".$token."'";
$conn->query($sql);

$conn->close();
?>  