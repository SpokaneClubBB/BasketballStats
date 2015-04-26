<?php

	if (isset($_POST["username"]) && isset($_POST["password"])) {

		$loggedin = False;
		$username = $_POST["username"];

		$db = new PDO('sqlite:assets/db/ewuscbb.db');
		$user = $db->query('SELECT Username, Password FROM Users WHERE Username="'.$username.'"');
		$db = NULL;

		//hash the password
		$pass = hash("sha256", $_POST["password"]);

		foreach ($user as $key => $row) {
			if ($pass == $row['Password']) {
		  		$loggedin = True;
			}
	  	}

	  	if ($loggedin) {
			setcookie("loggedin",1);
			setcookie("username", $_POST["username"]);
			header( 'Location: admin_home.php' );
		}else{
			header( 'Location: index.php' );
		}
	}
?>
