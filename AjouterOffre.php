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


     
        echo $input->prix;
        echo" ";
        echo $input->etat;
        echo " ";
        echo $input->iddemande;
        echo "    ";
        echo $input->idagent;
         $query="Insert into offre_agent (Prix,Etat,Demande_ID,Agent_ID) values ('".$input->prix."','".$input->etat."','".$input->iddemande."','".$input->idagent."');";
          
           $conn->query($query);
     
        
     
     
      
    
  
      ?>