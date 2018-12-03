 <?php
     $servername ="localhost";
     $username = "yassine";
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


    $query="INSERT INTO Avis(Avis_Details, Avis_NoteRating, agent_User_ID, client_User_ID) values ('".$input->avisDetails."','".$input->note."','".$input->agentID."','".$input->demandeurID."');";
        
    $conn->query($query);  
?>