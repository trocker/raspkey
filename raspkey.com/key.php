<?php


$isGet = true;
if(isset($_GET['submit'])){
	$isGet = false;
}


if($isGet){

	/*
	* Get the public key
	*
	*/

	//Take the email address
	if(isset($_POST['email'])){
		$email = $_POST['email'];	
		//Return the contents of the file with the name hash(email)
		$file_to_get = substr(hash("sha256", $email),0,10);
		return file_get_contents("keys/".$file_to_get);
	} else {
		echo "NOT_FOUND";	
	}


}

else {


	/*
	* Put the public key
	*
	*/

	//Take the public key
	$key=$_POST['pubkey'];
	if(isset($_POST['email'])){
		$email=$_POST['email'];
	} else {
		echo "SEND_EMAIL_WITH_KEY_FAILURE";
	}

	if(strpos($key, "BEGIN PGP PUBLIC KEY")===false){
		echo "WRONG_PUB_KEY_FORMAT";
	} else {
		//Sign the public key with your key
		
	 	//Put the signed key in a filename found by hashing the email address
		file_put_contents(substr(hash("sha256", $email),0,10), $enchanced_key);
		echo "KEY_ACCEPTED";
	}
	

}






