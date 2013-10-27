<?php 

function RegisterMail($name,$mail,$ipaddress,$confirmkey)
{
	$to = "$mail";
	$subject = "Activate your email address";
	$message = 
		"
		<!DOCTYPE html>
		<html><head></head>
		<body>
		Hello $name!<p>

		You seem to have registered on thijstervelde.com from the ipaddress $ipaddress to become an author on the blog. This is entirely possible, however you will have to confirm your email address first. Until then, you will not be able to contribute on the site.<br/>
		Press the following link in order to active your account<p>

		http://www.thijstervelde.com/dg239/day2/mail.php?m=$mail&key=$confirmkey


		

		<p><p>
		Have fun,<p>Thijs
		</body>
		</html>
		";




	
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

	$headers .= 'From: Thijs ter Velde <mail@thijstervelde.com>' . "\r\n";


	mail($to,$subject,$message,$headers);
	return true;
}


function ConfirmMail()
{

}


function Test()
{
	return('success');
}


 ?>

