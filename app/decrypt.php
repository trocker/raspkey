<?php

$text_to_decrypt = $_POST['decrypt_this'];
file_put_contents("encrypted_text", $text_to_decrypt);

//Decrypt text
$decrypted_text = shell_exec("gpg --no-tty --decrypt --passphrase abcpassword encrypted_text 2>&1");

//Send the decrypt text back
echo "<pre>".$decrypted_text."</pre>";

shell_exec("rm encrypted_text");


?>
