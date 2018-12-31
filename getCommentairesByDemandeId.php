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

$id = $_GET['id'];
$sql = "SELECT C.*, U.*, A.User_ID 'idAgent', A.User_ADRESS_MAIL 'mailAgent', A.numTel 'numTelAgent', A.User_CIN 'cinAgent', A.User_NOM 'nomAgent', A.User_password 'passwordAgent', A.User_PRENOM 'prenomAgent', A.User_role 'roleAgent', A.User_specialite 'specialiteAgent', A.Cordgeo_ID 'cordGeoAgent', A.User_picture 'pictureAgent', A.rating 'ratingAgent'  FROM commentaire C JOIN User U on C.idUser=U.User_ID JOIN User A on C.idAgent=A.User_ID WHERE C.idDemande=".$id." order by C.id desc";
$result = $conn->query($sql);
$return_arr = array();
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       	$row_array['idUser'] = $row['User_ID'];
      	$row_array['email'] = $row['User_ADRESS_MAIL'];
    	  $row_array['cin'] = $row['User_CIN'];
        $row_array['numTel'] = $row['numTel'];
   		  $row_array['nom'] = $row['User_NOM'];
   		  $row_array['password'] = $row['User_password'];
   	  	$row_array['prenom'] = $row['User_PRENOM'];
   		  $row_array['role'] = $row['User_role'];
   	  	$row_array['specialite'] = $row['User_specialite'];
   	   	$row_array['photo'] = $row['User_picture'];
      	$row_array['idCommentaire'] = $row['id'];
      	$row_array['idAgent'] = $row['idAgent'];
        $row_array['emailAgent'] = $row['mailAgent'];
        $row_array['cinAgent'] = $row['cinAgent'];
        $row_array['numTelAgent'] = $row['numTelAgent'];
        $row_array['nomAgent'] = $row['nomAgent'];
        $row_array['passwordAgent'] = $row['passwordAgent'];
        $row_array['prenomAgent'] = $row['prenomAgent'];
        $row_array['roleAgent'] = $row['roleAgent'];
        $row_array['specialiteAgent'] = $row['specialiteAgent'];
        $row_array['photoAgent'] = $row['pictureAgent'];
        $row_array['ratingAgent'] = $row['ratingAgent'];
      array_push($return_arr,$row_array);
    }
    echo json_encode($return_arr);
} else {
    echo "0 results";
}
$conn->close();
?>