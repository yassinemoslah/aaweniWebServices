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
$sql = "SELECT * FROM Demande WHERE clientD_User_ID =".$id." order by Demande_ID desc";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $row_array['id'] = $row['Demande_ID'];
      $row_array['date'] = $row['Dem_Date'];
    	$row_array['etat'] = $row['Dem_Etat'];
   		$row_array['panne'] = $row['Dem_Panne'];
   		$row_array['type'] = $row['Dem_Type'];
   		$row_array['photo'] = $row['Dem_picture'];
   		$row_array['titre'] = $row['Dem_titre'];

      array_push($return_arr,$row_array);
    }
    echo json_encode($return_arr);
} else {
    echo "0 results";
}
$conn->close();
?>