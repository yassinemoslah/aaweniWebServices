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

$sql = "SELECT Agent_ID FROM Offre_Agent WHERE Demande_ID=".$demandeID;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $idAgent = $row['Agent_ID'];
    }
} else {
    echo "0 results";
}

$sql = "select count(*) as nb from Offre_Agent WHERE Etat=1 and Agent_ID=".$idAgent;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $nb = $row['nb'];
    }
} else {
    echo "0 results";
}


if ($nb==20){
	$sql = "UPDATE User SET grade=2 WHERE User_ID=".$idAgent;
	$conn->query($sql);
} else if ($nb==60){
	$sql = "UPDATE User SET grade=3 WHERE User_ID=".$idAgent;
	$conn->query($sql);
}

$conn->close();
?>