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
    $specialite=$_GET['specialite'];
    $sql ="select D.*,C.* from demande D join cordgeodemande C on D.Cordgeo_ID=C.Cord_ID WHERE D.Dem_Type=".$specialite;
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
        $row_array['longitude']=$row['Cord_Longitude'];
        $row_array['latitude']=$row['Cord_Latitude'];
        array_push($return_arr,$row_array);
        
     }
   echo json_encode($return_arr);
        }else{
          echo "0 result";
        }
        $conn->close();
        ?>
     
