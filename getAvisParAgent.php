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
    $sql ="select  A.*,U.* from avis A join user U on A.client_User_ID=U.User_ID  WHERE A.agent_User_ID=".$idAgent;
    $result=$conn->query($sql);
     
     if($result->num_rows>0)
    {
    	while($row=$result->fetch_assoc())
    	{

        $row_array['note']=$row['rating'];
        $row_array['pictureClient']=$row['User_picture'];
        $row_array['prenom']=$row['User_PRENOM'];
        $row_array['nom']=$row['User_NOM'];
        $row_array['AvisDetails']=$row['Avis_Details'];
        $row_array['noteRating']=$row['Avis_NoteRating'];


        array_push($return_arr,$row_array);
        
     }
   echo json_encode($return_arr);
        }else{
          echo "0 result";
        }
        $conn->close();
        ?>
     
