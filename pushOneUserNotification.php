<?php 
	 $servername ="localhost";
     $username = "yassine";
     $password ="";
     $dbname = "aaweni";
      
     //create connection
     $conn= new mysqli($servername, $username, $password, $dbname);

     $idUser = $_GET['userID'];
	 $title = $_GET['title'];
	 $body = $_GET['message'];

	if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	} 

     $sql = "Select token from tokens where idUser=".$idUser;
     $result = $conn->query($sql);
     $tokens = array();
     if ($result->num_rows >0){
     	while ($row = $result->fetch_assoc()){
     		$tokens[] = $row["token"];
     	}
     }

     $conn->close();
     
     $message = array("message"=>$body, "title"=>$title);
     $message_status = send_notification($tokens, $message);

     echo $message_status;

	function send_notification($tokens, $message){
		$url = 'https://fcm.googleapis.com/fcm/send';

		$fields = array('registration_ids' => $tokens,
		'data' => $message
		  );

		$headers = array(
				'Authorization:key = AAAAYXEYLRI:APA91bEOAtx8dB9M5X_p5ul4B684UlJrE_4psKV-R-H5nZxjy3rf5l6HN6sZgqWfgrek-5_nbwz-OgHuWBY4SczVZEX4xn3ax46TDFUeXF-8ezKMPIECgpCXiIKiST72UGAeDRsLAMsE',
				'Content-Type: application/json'
		);

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

		$result = curl_exec($ch);
		if ($result === FALSE){
			echo 'Curl failed '.curl_error($ch);
			die ('Curl failed '.curl_error($ch));
		}

		curl_close($ch);

		return $result;
	}



?>