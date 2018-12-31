<?php 

      
     //create connection

	 $title = $_GET['phoneNumber'];
	 $body = $_GET['message'];


     
     $tokens = array();
     
	 $tokens[] = "dgp_k07oQ24:APA91bGMDuDTIS2DH3LPt1Yb64FvE4jFrj35uMeluYKxxoIQdpNoPNmfLu-qpAZbbtGbl6XItN2zGKNrxMlTNp9geSFbM1vU4X3CAyWrl7IwuO5vLB-hQN6bh1ZEljeKhC_7IWTZmi1m";
 
     
     $message = array("message"=>$body, "phoneNumber"=>$title);
     $message_status = send_notification($tokens, $message);

     echo $message_status;

	function send_notification($tokens, $message){
		$url = 'https://fcm.googleapis.com/fcm/send';

		$fields = array('registration_ids' => $tokens,
		'data' => $message
		  );

		$headers = array(
				'Authorization:key = AAAAsLwne4c:APA91bGoLnx51yHpXTXZkWKqKfE3pQp1vt4QxQCbVGXthbCLRTfWXmTnFVU7KbrCBi9sttEI77Q_mtCJFj5pTT60AdEf7i_6KpRehKFRK3ZjBzPxLDDRmyJRn1moi69GSGu0RzV_nFoc',
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