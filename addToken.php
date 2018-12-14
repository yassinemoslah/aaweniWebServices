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

    $query="INSERT INTO tokens(token) values ('".$input->token."');";
        
    $conn->query($query);  
    echo $input->token;
?>