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
     
    $return_arr=array();
    $idAgent=$_GET['idAgent'];
    $sql ="select D.*,C.*,U.*,A.* from demande D join cordgeodemande C on D.Cordgeo_ID=C.Cord_ID join user U on U.User_ID=D.clientD_User_ID join adresse A on A.idDemande=D.Demande_ID WHERE D.Dem_Etat='0' and D.idAgent=".$idAgent;
     $result=$conn->query($sql);
     
     if($result->num_rows>0)
    {
    	while($row=$result->fetch_assoc())
    	{
    
   	    $row_array['id']=$row['Demande_ID'];
    	$row_array['etat']=$row['Dem_Etat'];
    	$row_array['panne']=$row['Dem_Panne'];
        $row_array['type']=$row['Dem_Type'];
        $row_array['date']=$row['Dem_Date'];
        $row_array['idClient']=$row['clientD_User_ID'];
        $row_array['picture']=$row['Dem_picture'];
        $row_array['titre']=$row['Dem_titre'];
        $row_array['pictureDemandeur']=$row['User_picture'];
        $row_array['numTel']=$row['numTel'];
        $row_array['prenom']=$row['User_PRENOM'];
        $row_array['nom']=$row['User_NOM'];
        $row_array['idcor']=$row['Cord_ID'];
        $row_array['longitude']=$row['Cord_Longitude'];
        $row_array['latitude']=$row['Cord_Latitude'];
        $row_array['ville']=$row['ville'];
        $row_array['gouvernorat']=$row['gouvernorat'];
        $row_array['pays']=$row['pays'];
        $row_array['codePostal']=$row['code_postal'];
        array_push($return_arr,$row_array);
        
     }
   echo json_encode($return_arr);
        }else{
          echo "0 result";
        }
        $conn->close();
        ?>
     
