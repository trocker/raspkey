<?php


$isEverythingAlright = true;


//Email for which keys will be generated

$email = $_POST['email'];
//$email = "foo@joe.bar";
//TODO: validate email

if(empty($email)){
	$isEverythingAlright = false;
}


//Remove all the keys you have currently on the raspberry pi
$all_key_ids = shell_exec('gpg --fingerprint | egrep -o "=[[:space:]].+[[:space:]].+[[:space:]]*" | xargs echo | sed -e "s/= /\n/g" 2>&1');

foreach(explode("\n", $all_key_ids) as $value){
        if(empty($value)){
        } else {
                echo "\nDeleting the key - $value\n";
                shell_exec("gpg --batch --delete-secret-key '$value'");
                //shell_exec("gpg --batch --delete-key $value");
        }
}


$all_key_ids = shell_exec('gpg --list-keys | egrep -o "/.+[[:space:]]+" | xargs echo | sed -e "s/\//\n/g" 2>&1');
foreach(explode("\n", $all_key_ids) as $value){
        if(empty($value)){
        } else {
                echo "\nDeleting the key - $value\n";
                shell_exec("gpg --batch --yes --delete-key $value");
        }
}
//Copy gpg_seed to gpg_custom_seed 
if($isEverythingAlright){
	copy("gpg_seed","gpg_custom_seed");
}

//Use gpg_custom_seed to Generate keys
if($isEverythingAlright){
	$file_contents = file_get_contents("gpg_custom_seed");
	$file_contents = str_replace("joe@foo.bar",$email,$file_contents);
	file_put_contents("gpg_custom_seed",$file_contents);
}
shell_exec("./create_pgp.sh");

//Move setup.php to I_KNOW_WHAT_I_AM_DOING.php - for manual overriding of keys
if($isEverythingAlright){
	rename("setup.php", "I_KNOW_WHAT_I_AM_DOING.php");
}

if($isEverythingAlright){
	echo "<h4>The setup was successful. Please go ahead to Encryption / Decryption - <a href='index.php'>Home</a></h4>";
	/* Put the setup flag on the disk */
	file_put_contents("setup_done_flag", "yes");


	/* Send the public key to raspkey.com */
	//$ch = curl_init();

	//curl_setopt($ch, CURLOPT_URL,            "http://raspkey.com/key.php" );
	//curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
	//curl_setopt($ch, CURLOPT_POST,           1 );
	//curl_setopt($ch, CURLOPT_POSTFIELDS,     "pub=".$pub_key ); 
	////curl_setopt($ch, CURLOPT_HTTPHEADER,     array('Content-Type: text/plain')); 

	//$result=curl_exec($ch);
	
} else {
	echo "<h4>The setup was not successful. Please do it again at <a href='setup.php'>Setup</a></h4>";
}
?>



