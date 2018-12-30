 <?php
     $servername ="localhost";
     $username = "root";
     $password ="";
     $dbname = "aaweni";
      
     //create connection
     $conn= new mysqli($servername, $username, $password, $dbname);
      //check connection
     if($conn->connect_error)
     {
        die("connection failed".$conn->connect_error);
     }

     $inputJSON = file_get_contents('php://input');
     $input = json_decode($inputJSON);


     if (strcmp ($input->date, '0-0-0T0:0:00.000')===0){
     	$sql = "UPDATE Demande set Dem_Panne='".$input->panne."', Dem_picture='".$input->picture."', Dem_titre='".$input->titre."' WHERE Demande_ID=".$input->demandeID;
     }
     else{
     	 $sql = "UPDATE Demande set Dem_Date='".$input->date."', Dem_Panne='".$input->panne."', Dem_picture='".$input->picture."', Dem_titre='".$input->titre."' WHERE Demande_ID=".$input->demandeID;
     }
	$conn->query($sql);
	
	$sql = "UPDATE CordgeoDemande set Cord_Latitude=".$input->latitude.", Cord_Longitude=".$input->longitude." WHERE Cord_ID=".$input->cordID;
	$conn->query($sql);
	$sql = "UPDATE Adresse set rue='".$input->rue."', ville='".$input->ville."', gouvernorat='".$input->gouvernorat."', pays='".$input->pays."', code_postal=".$input->codePostal." WHERE idDemande=".$input->demandeID;
	$conn->query($sql);

?>

50480651