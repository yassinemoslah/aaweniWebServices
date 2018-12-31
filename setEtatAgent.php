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

$idUser = $_GET['idUser'];

$sql = "UPDATE User set etat=1 WHERE User_ID=".$idUser;
$conn->query($sql);


$conn->close();
?>