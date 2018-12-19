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
$sql = "select U.User_NOM, U.User_PRENOM, U.User_picture, O.* from Offre_Agent O JOIN User U on O.Agent_ID=U.User_ID WHERE O.Demande_ID=".$id;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $row_array['id'] = $row['Offre_Agent_ID'];
    	$row_array['etat'] = $row['Etat'];
   		$row_array['prix'] = $row['Prix'];
   		$row_array['demande_id'] = $row['Demande_ID'];
   		$row_array['agent_id'] = $row['Agent_ID'];
   		$row_array['user_nom'] = $row['User_NOM'];
   		$row_array['user_prenom'] = $row['User_PRENOM'];
   		$row_array['user_picture'] = $row['User_picture'];
         array_push($return_arr,$row_array);
    }
    echo json_encode($return_arr);
} else {
    echo "0 results";
}
$conn->close();
?>