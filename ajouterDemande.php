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


    $query="INSERT INTO CordgeoDemande(Cord_Latitude, Cord_Longitude) values ('".$input->latitude."','".$input->longitude."');";
        $conn->query($query);  

    $sql = "SELECT Cord_ID FROM CordgeoDemande ORDER BY Cord_ID DESC LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
     while($row = $result->fetch_assoc()) {
       $row_array['id'] = $row['Cord_ID'];
      }
    }


    $query="INSERT INTO Demande(Dem_Date, Dem_Etat, Dem_Panne, Dem_Type, clientD_User_ID, Cordgeo_ID, Dem_picture, Dem_titre, urgente, idAgent) values ('".$input->date."','".$input->etat."','".$input->panne."','".$input->type."','".$input->clientID."','".$row_array['id']."','".$input->picture."','".$input->titre."','".$input->urgente."','".$input->idAgent."');";
        $conn->query($query);  

$sql = "SELECT Demande_ID FROM Demande ORDER BY Demande_ID DESC LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
     while($row = $result->fetch_assoc()) {
       $row_array['id'] = $row['Demande_ID'];
      }
    }

   $query="INSERT INTO Adresse(rue, ville, gouvernorat, code_postal, pays, idDemande) values ('".$input->rue."','".$input->ville."','".$input->gouvernorat."',".$input->codePostal.",'".$input->pays."','".$row_array['id']."');";
    $conn->query($query);  
    
   
?>