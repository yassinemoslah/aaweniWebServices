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
$id = $_GET['id'];

$sql = "select O.*,D.* from offre_agent O join demande D on D.Demande_ID=O.Demande_ID WHERE O.Agent_ID=".$id." order by O.Offre_Agent_ID desc";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

      $row_array['id'] = $row['Offre_Agent_ID'];
    	$row_array['etat'] = $row['Etat'];
   		$row_array['prix'] = $row['Prix'];
   		$row_array['demande_id'] = $row['Demande_ID'];
   		$row_array['agent_id'] = $row['Agent_ID'];
      $row_array['picture'] = $row['Dem_picture'];
      $row_array['titre_demande'] = $row['Dem_titre'];
   	
         array_push($return_arr,$row_array);
         
    }

    echo json_encode($return_arr);
} else {
    echo "0 results";
}
$conn->close();
?>