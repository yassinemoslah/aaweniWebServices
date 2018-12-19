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

$demandeID = $_GET['demandeID'];
$offreID = $_GET['offreID'];
$sql = "UPDATE Offre_Agent set Etat='-1' WHERE Demande_ID=".$demandeID;
$conn->query($sql);
$sql = "UPDATE Offre_Agent set Etat='1' WHERE Demande_ID=".$demandeID." and Offre_Agent_ID=".$offreID;
$conn->query($sql);
$sql = "UPDATE Demande SET Dem_Etat=1 WHERE Demande_ID=".$demandeID;
$conn->query($sql);

$conn->close();
?>