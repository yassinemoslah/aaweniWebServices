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


$sql = "select U.*,C.* from user U join CordgeoUser C on U.Cordgeo_ID = C.Cord_ID ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

      $row_array['id'] = $row['User_ID'];
      $row_array['mail'] = $row['User_ADRESS_MAIL'];
      $row_array['cin'] = $row['User_CIN'];
      $row_array['nom'] = $row['User_NOM'];
      $row_array['password'] = $row['User_password'];
      $row_array['prenom'] = $row['User_PRENOM'];
      $row_array['role'] = $row['User_role'];
      $row_array['specialite'] = $row['User_specialite'];
      $row_array['photo'] = $row['User_picture'];
      $row_array['idCord'] = $row['Cordgeo_ID'];
      $row_array['latitude'] = $row['Cord_Latitude'];
      $row_array['longitude'] = $row['Cord_Longitude'];
    
         array_push($return_arr,$row_array);
         
    }

    echo json_encode($return_arr);
} else {
    echo "0 results";
}
$conn->close();
?>