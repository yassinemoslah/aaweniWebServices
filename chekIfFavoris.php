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

$idAgent = $_GET['idAgent'];
$idDemandeur = $_GET['idDemandeur'];
$sql = "select * from favoris WHERE idDemandeur =".$idDemandeur ." and idAgent=".$idAgent;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    echo "yes";
} else {
    echo "no";
}
$conn->close();
?>