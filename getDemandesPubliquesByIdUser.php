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

$return_arr = array();
$id = $_GET['id'];
$sql = "SELECT D.*, A.*, C.* FROM Demande D JOIN Adresse A on D.Demande_ID=A.idDemande JOIN CordgeoDemande C on C.Cord_ID=D.Cordgeo_ID WHERE D.idAgent=0 AND D.urgente=0 and D.clientD_User_ID=".$id." order by D.Demande_ID desc";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $row_array['idDemande'] = $row['Demande_ID'];
      $row_array['dateDemande'] = $row['Dem_Date'];
      $row_array['etatDemande'] = $row['Dem_Etat'];
      $row_array['panne'] = $row['Dem_Panne'];
      $row_array['type'] = $row['Dem_Type'];
      $row_array['photoDemande'] = $row['Dem_picture'];
      $row_array['titreDemande'] = $row['Dem_titre'];
      $row_array['idCord'] = $row['Cordgeo_ID'];
      $row_array['latitude'] = $row['Cord_Latitude'];
      $row_array['longitude'] = $row['Cord_Longitude'];
      $row_array['idAdresse'] = $row['idAdresse'];
      $row_array['rue'] = $row['rue'];
      $row_array['ville'] = $row['ville'];
      $row_array['gouvernorat'] = $row['gouvernorat'];
      $row_array['code_postal'] = $row['code_postal'];
      $row_array['pays'] = $row['pays'];

      array_push($return_arr,$row_array);
    }
    echo json_encode($return_arr);
} else {
    echo "0 results";
}
$conn->close();
?>