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


    $query="INSERT INTO Commentaire(idAgent, idUser, idDemande) values ('".$input->idAgent."','".$input->idUser."','".$input->idDemande."');";
        
    $conn->query($query);  
?>