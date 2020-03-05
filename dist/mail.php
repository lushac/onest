<?php
if(isset($_POST['email'])) {

 $email_to = "yourMail@mail.com";
 $email_subject = "One - Contact form";

 function died($error) {
	?> 
	<html>
		<head>
			<meta charset="UTF-8" />
			<meta name="viewport" content="width=device-width, initial-scale=1.0" />
			<meta http-equiv="X-UA-Compatible" content="ie=edge" />
			<meta name="description"”" content="Lorem ipsum dolor sit amet consectetur
    		adipisicing elit. Aspernatur, asperiores.">
			<link rel="shortcut icon" type="image/png" href="img/favicon.png" />
			<link rel="apple-touch-icon" href="img/icon-192.png" />
			<link rel="manifest" href="manifest.json" crossorigin="use-credentials" />
			<meta name="theme-color" content="#fbfbff" />
			<link rel="stylesheet" href="css/main.css" />
			<title>ONE - digital agency | Mail Error</title>
		</head>
		<body id="mail">
			<h1 class='py-1'>There was an error while sending a message. Check your inputs and try again.</h1>
			<a href="index.html">
				<button class="btn">
					Go back
				</button>
			</a>
		</body>
	<html>
	<?php 
	 die();
 }


 // validation expected data exists
 if(!isset($_POST['name']) ||
	 !isset($_POST['email']) ||
	 !isset($_POST['message'])) {
	 died('We are sorry, but there appears to be a problem with the form you submitted.');       
 }

 $name = $_POST['name'];
 $email_from = $_POST['email']; 
 $message = $_POST['message']; 

 $error_message = "";
 $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

if(!preg_match($email_exp,$email_from)) {
 $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
}

 $string_exp = "/^[A-Za-z .'-]+$/";

if(!preg_match($string_exp,$name)) {
 $error_message .= 'Name you entered does not appear to be valid.<br />';
}


if(strlen($message) < 2) {
 $error_message .= 'Message you entered do not appear to be valid.<br />';
}

if(strlen($error_message) > 0) {
 died($error_message);
}

 $email_message = "Form details below.\n\n";

  
 function clean_string($string) {
   $bad = array("content-type","bcc:","to:","cc:","href");
   return str_replace($bad,"",$string);
 }

  

 $email_message .= "Name: ".clean_string($name)."\n";
 $email_message .= "Email: ".clean_string($email_from)."\n";
 $email_message .= "Message: ".clean_string($message)."\n";


@mail($email_to, $email_subject, $email_message);  
?>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta http-equiv="X-UA-Compatible" content="ie=edge" />
		<meta name="description"”" content="Lorem ipsum dolor sit amet consectetur
		adipisicing elit. Aspernatur, asperiores.">
		<link rel="shortcut icon" type="image/png" href="img/favicon.png" />
		<link rel="apple-touch-icon" href="img/icon-192.png" />
		<link rel="manifest" href="manifest.json" crossorigin="use-credentials" />
		<meta name="theme-color" content="#fbfbff" />
		<link rel="stylesheet" href="css/main.css" />
		<title>ONE - digital agency | Mail Error</title>
	</head>
	<body id="mail">
		<h1 class='py-1'>Message sent</h1>
		<a href="index.html">
			<button class="btn">
				Go back
			</button>
		</a>
	</body>
<html>

<?php

}
?>