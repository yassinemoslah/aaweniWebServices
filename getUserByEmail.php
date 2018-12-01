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

$email = $_GET['email'];
$sql = "SELECT U.*, C.* FROM User U JOIN CordgeoUser C WHERE U.Cordgeo_ID = C.Cord_ID and User_ADRESS_MAIL=".$email;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $row_array['id'] = $row['User_ID'];
      $row_array['email'] = $row['User_ADRESS_MAIL'];
    	$row_array['cin'] = $row['User_CIN'];
   		$row_array['nom'] = $row['User_NOM'];
   		$row_array['password'] = $row['User_password'];
   		$row_array['prenom'] = $row['User_PRENOM'];
   		$row_array['role'] = $row['User_role'];
   		$row_array['specialite'] = $row['User_specialite'];
   		$row_array['photo'] = $row['User_picture'];
      $row_array['rating'] = $row['rating'];
      $row_array['idCord'] = $row['Cordgeo_ID'];
      $row_array['latitude'] = $row['Cord_Latitude'];
      $row_array['longitude'] = $row['Cord_Longitude'];

    }
    echo json_encode($row_array);
} else {
    echo "0 results";
}
$conn->close();
?>