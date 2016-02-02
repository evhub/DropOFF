<?php $errors = '';
$myemail = 'jonah@dropabet.com';
if(empty($_POST['name'])  ||
   empty($_POST['email']))
	{
    $errors .= "\n Error: all fields are required";
}

//$url = 'https://www.google.com/recaptcha/api/siteverify';

//if(isset($_POST['g-recaptcha-response'])){
//	$captcha=$_POST['g-recaptcha-response'];
//}

//if($captcha==''){
	//echo "<h2>Please return to the previous page, click \"Contact Us\" and complete the \"I'm not a robot\" field.</h2>";	
	//exit;
//}else{
	//$myvars = 'secret=' . "6LeeqQkTAAAAAP4vgclgAdJXQNz3RG9TKqCLS8wi" . '&response=' . $captcha;
	
	//$ch = curl_init( $url );
	//curl_setopt( $ch, CURLOPT_POST, 1);
	//curl_setopt( $ch, CURLOPT_POSTFIELDS, $myvars);
	//curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
	//curl_setopt( $ch, CURLOPT_HEADER, 0);
	//curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
	
	//$response = curl_exec( $ch );
	
	//$redirecturl = $_POST['redirect'];
	
	//if(json_decode($response)->{'success'}){
	
		$name = $_POST['name'];
		
		$email_address = $_POST['email'];
		$order = $_POST['order'];
		$message = $_POST['comments'];
		
		$shirts = $_POST['shirt-quantity'];
		$sizes = $_POST['sizes'];
		$mug1 = $_POST['mug1-quantity'];
		$mug2 = $_POST['mug2-quantity'];
		$pen = $_POST['pen-quantity'];

		
		if( empty($errors))
		{
		$to = $myemail;
		$email_subject = "DropOFF order form submission: $name";
		$email_body = "You have received a new message. ".
		" Here are the details:\n Name: $name \n ".
		"Email: $email_address\n \n \n ".
		"Order Details: \n Shirts: $shirts in sizes $sizes \n DropOFF Mugs: $mug1 \n Be Green... Or Blue Mugs: $mug2 \n Pens: $pen \n \n \n \n".
		"Order Details: $order\n Comments: $message\n";
		$headers = "From: $myemail\n";
		$headers .= "Reply-To: $email_address";
		mail($to,$email_subject,$email_body,$headers);
		header("Refresh: 0;url=http://www.dropabet.com/index.html#thanks");
	//}else{
		header("Refresh: 0;url=http://test.xactnatural.com$redirecturl");
	//}
//}
?>
<?php
}
?>
