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

$specialite = $_GET['specialite'];
$sql = "select U.*, C.*, A.* from User U JOIN CordgeoUser C on U.Cordgeo_ID=C.Cord_ID JOIN Adresse A ON A.idUser=U.User_ID WHERE U.User_specialite = '".$specialite."' order by U.grade desc, U.rating desc";
$result = $conn->query($sql);
$return_arr = array();
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       	$row_array['id'] = $row['User_ID'];
      	$row_array['email'] = $row['User_ADRESS_MAIL'];
    	  $row_array['cin'] = $row['User_CIN'];
        $row_array['numTel'] = $row['numTel'];
   		  $row_array['nom'] = $row['User_NOM'];
   		  $row_array['password'] = $row['User_password'];
   	  	$row_array['prenom'] = $row['User_PRENOM'];
   		  $row_array['role'] = $row['User_role'];
   	  	$row_array['specialite'] = $row['User_specialite'];
   	   	$row_array['photo'] = $row['User_picture'];
      	$row_array['rating'] = $row['rating'];
      	$row_array['idCord'] = $row['Cord_ID'];
      	$row_array['latitude'] = $row['Cord_Latitude'];
      	$row_array['longitude'] = $row['Cord_Longitude'];
      	$row_array['idAdresse'] = $row['idAdresse'];
      	$row_array['rue'] = $row['rue'];
      	$row_array['ville'] = $row['ville'];
        $row_array['gouvernorat'] = $row['gouvernorat'];
       	$row_array['code_postal'] = $row['code_postal'];
      	$row_array['pays'] = $row['pays'];
        $row_array['grade'] = $row['grade'];
      array_push($return_arr,$row_array);
    }
    echo json_encode($return_arr);
} else {
    echo "0 results";
}
$conn->close();
?>