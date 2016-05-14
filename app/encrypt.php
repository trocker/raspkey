<?php

//Take the email id and get his/her public key
$email = $_POST['email'];
//$email = "foo@joe.bar";
$text_to_encrypt = $_POST['encrypt_this'];
$text_to_encrypt = "Hello";
//TODO: Add the public key to trustdb
/* Do curl call and save it to and gpg import it */

//Encrypt with that public key for that email address
$encrypted_text = shell_exec("echo $text_to_encrypt | gpg --encrypt --armor -r '$email' 2>&1");


//Send the encrypted text back
echo $encrypted_text;

?>
