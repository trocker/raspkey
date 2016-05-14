<?php

//TODO: Check if the setup_done file exists.
$isSetupDone = false;
$filename = "setup_done_flag";

if (file_exists($filename)){
	$isSetupDone = true;
}

if($isSetupDone){
	
} else {
	echo "<html>
		<head>
             	      <title>Welcome to Raspkey setup!</title>
		</head>
		<body>
		      <h4>Please run the setup before here - <a href='setup.php'>Setup Page</a></h4>
		</body>
	      </html>
	     ";
	exit();
}


?>

<html>
<head>
<title>Raspkey!</title>
</head>
<body>
	<h2>Raspkey Encryption or Decryption</h2>
	<br/>
	<h4><u>Encryption</u></h4>
	<br/>
	<form action="encrypt.php" method="POST">
		<label>Email ID of Receiver:</label><input type="text" name="email" placeholder="NOT your email address."/><br/>
		<label>Text to encrypt:</label><textarea name="encrypt_this" placeholder="Text to encrypt." style="width: 80%; height: 100px;"></textarea>
		<br/>
		<input type="submit" value="Encrypt" style="font-size: 20px; margin: 40px;"/>
	</form>
	<br/>
	<h4><u>Decryption</u></h4>
	<br/>
	<form action="decrypt.php" method="POST">
		<label>Decrypt the text sent to you:</label><textarea name="decrypt_this" placeholder="Text to decrypt." style="width: 80%; height: 100px;"></textarea>
		<br/>
		<input type="submit" value="Decrypt" style="font-size: 20px; margin: 40px;"/>
	</form>
</body>
</html>
