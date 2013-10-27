<?php header( "refresh:5;url=blog.php" ); require_once('db_connect.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Mail confirmation</title>
	<link rel="stylesheet" src="style.css" />
</head>
<body>
<div id="container">
<?php require_once('blogheader.php') ?>
<hr/>
<section>
<h1>Confirming mail</h1><br/>

<?php
$mail = $_GET['m'];
$confirmkey = $_GET['key'];

$sql = "SELECT * FROM day2_author WHERE mail='$mail'"; //Query to get author with that id from database
	if($result = mysqli_query($db, $sql))
	{
		if($row = mysqli_fetch_array($result))
		{
			if($row['mailconfirmed'] != NULL )
			{
				echo 'This email address is already confirmed, no need to reconfirm. You will be redirected in 5 seconds.';
			}
			else if($confirmkey = 12345)
			{
				echo 'Your mail address is confirmed. You will be redirected in 5 seconds.';
				$sql = "UPDATE day2_author SET mailconfirmed=1 WHERE mail='$mail'";
				mysqli_query($db, $sql);
			}
			else
			{
				echo 'Something went wrong! The key is invalid and your email address is not confirmed. You will be redirected in 5 seconds.';
			}

			$name 	= $row['name'];
			$bio 	= $row['bio'];
		}
	}

require_once('db_close.php'); ?>

</body>
</html>
