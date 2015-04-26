<?php
	//Delete your cookies to log you out.
	setcookie("loggedin", 0);
	setcookie("username", "");
	header( 'Location: index.php' );
?>