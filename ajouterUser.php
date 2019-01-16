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



    $query="INSERT INTO CordgeoUser(Cord_Latitude, Cord_Longitude) values ('".$input->latitude."','".$input->longitude."');";
        $conn->query($query);  


    $sql = "SELECT Cord_ID FROM CordgeoUser ORDER BY Cord_ID DESC LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
     while($row = $result->fetch_assoc()) {
       $row_array['id'] = $row['Cord_ID'];
      }
    }


    $query="INSERT INTO User(User_ADRESS_MAIL, numTel, User_CIN, User_NOM, User_password, User_PRENOM, User_role, User_specialite, Cordgeo_ID, User_picture, etat, codeVerification) values ('".$input->adresseMail."','".$input->numTel."','".$input->cin."','".$input->nom."','".$input->password."','".$input->prenom."','".$input->role."','".$input->specialite."',".$row_array['id'].",'".$input->picture."',".$input->etat.",".$input->codeVerification.");";


        $conn->query($query);  

 $sql = "SELECT User_ID FROM User ORDER BY User_ID DESC LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
     while($row = $result->fetch_assoc()) {
       $row_array['id'] = $row['User_ID'];
      }
    }

   $query="INSERT INTO Adresse(rue, ville, gouvernorat, code_postal, pays, idUser) values ('".$input->rue."','".$input->ville."','".$input->gouvernorat."',".$input->codePostal.",'".$input->pays."','".$row_array['id']."');";
    $conn->query($query);  
    echo $row_array['id'];
?>