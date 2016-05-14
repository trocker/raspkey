<?php



?>
<html>
<head>
<title>Welcome to Raspkey setup!</title>
</head>
<body>
	<h2>Raspkey Setup</h2>
	<br/>
	<h4>It's important, because, you can only decrypt emails sent to this email (from other raspkey users).</h4>
	<br/>
	<form action="setup_finalize.php" method="POST">
		<label>Email ID:</label><input type="text" name="email" placeholder="Your email address. It's important."/>
		<input type="submit" value="One-Click Setup"/>
	</form>
</body>
</html>
