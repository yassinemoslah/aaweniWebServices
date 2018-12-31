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
    $iddemande=$_GET['iddemande'];
    $idagent=$_GET['idagent'];
    $sql ="select O.Etat from offre_agent O WHERE O.Demande_ID=".$iddemande. "and O.Agent_ID=".$idagent;
    
     $result=$conn->query($sql);
     
     
     if($result->num_rows>0)
    {
    	while($row=$result->fetch_assoc())
    	{
         
   	    $row_array['etat']=$row['Etat'];
        array_push($return_arr,$row_array);
        
     }
   echo json_encode($return_arr);
        }else{
          echo "0 results";
        }
        $conn->close();
        ?>
     
