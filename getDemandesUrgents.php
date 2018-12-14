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

$return_arr = array();
$sql = "SELECT D.*, A.*, U.*, C.* FROM Demande D JOIN Adresse A on D.Demande_ID=A.idDemande JOIN User U on D.clientD_User_ID=U.User_ID JOIN CordgeoDemande C on C.Cord_ID=D.Cordgeo_ID WHERE D.urgente=1 and D.Dem_Etat=0";
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
      $row_array['idUser'] = $row['User_ID'];
      $row_array['email'] = $row['User_ADRESS_MAIL'];
      $row_array['cin'] = $row['User_CIN'];
      $row_array['nom'] = $row['User_NOM'];
      $row_array['password'] = $row['User_password'];
      $row_array['prenom'] = $row['User_PRENOM'];
      $row_array['role'] = $row['User_role'];
      $row_array['specialite'] = $row['User_specialite'];
      $row_array['photo'] = $row['User_picture'];
      $row_array['rating'] = $row['rating'];
      $row_array['numTel'] = $row['numTel'];
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