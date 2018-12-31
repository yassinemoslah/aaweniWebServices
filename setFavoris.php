<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aaweni";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$idDemandeur = $_GET['idDemandeur'];
$idAgent = $_GET['idAgent'];
$insert = $_GET['insert'];

if ($insert=="1"){
  $sql = "INSERT INTO favoris(idDemandeur, idAgent) VALUES (".$idDemandeur.",".$idAgent.")";
  $conn->query($sql);
}else
{
    $sql = "DELETE FROM favoris WHERE idDemandeur=".$idDemandeur." and idAgent=".$idAgent;
    $conn->query($sql);
}

$conn->close();
?>