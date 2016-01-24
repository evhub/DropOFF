<?php $errors = '';
$myemail = 'krubin@xactnatural.com';
if(empty($_POST['name'])  ||
   empty($_POST['email']))
	{
    $errors .= "\n Error: all fields are required";
}

$url = 'https://www.google.com/recaptcha/api/siteverify';

if(isset($_POST['g-recaptcha-response'])){
	$captcha=$_POST['g-recaptcha-response'];
}

if($captcha==''){
	echo "<h2>Please return to the previous page, click \"Contact Us\" and complete the \"I'm not a robot\" field.</h2>";	
	exit;
}else{
	$myvars = 'secret=' . "6LeeqQkTAAAAAP4vgclgAdJXQNz3RG9TKqCLS8wi" . '&response=' . $captcha;
	
	$ch = curl_init( $url );
	curl_setopt( $ch, CURLOPT_POST, 1);
	curl_setopt( $ch, CURLOPT_POSTFIELDS, $myvars);
	curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt( $ch, CURLOPT_HEADER, 0);
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
	
	$response = curl_exec( $ch );
	
	$redirecturl = $_POST['redirect'];
	
	if(json_decode($response)->{'success'}){
	
		$name = $_POST['name'];
		
		$email_address = $_POST['email'];
		$phone = $_POST['phone'];
		$service = $_POST['service'];
		$message = $_POST['comments'];
		
		if( empty($errors))
		{
		$to = $myemail;
		$email_subject = "Contact form submission: $name";
		$email_body = "You have received a new message. ".
		" Here are the details:\n Name: $name \n ".
		"Email: $email_address\n Phone Number: $phone\n Interested in: $service\n Message: \n $message";
		$headers = "From: $myemail\n";
		$headers .= "Reply-To: $email_address";
		mail($to,$email_subject,$email_body,$headers);
		header("Refresh: 0;url=http://test.xactnatural.com$redirecturl#thanks");
	}else{
		header("Refresh: 0;url=http://test.xactnatural.com$redirecturl");
	}
}
?>
<?php
}
?>
