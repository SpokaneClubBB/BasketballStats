<?php
	
	if(isset($_COOKIE["loggedin"]) && $_COOKIE["loggedin"]==1)
		{
			//If you're logged in then redirect you to the landing page.
			//header( 'Location: index.php' );
		}		 

?>

	<?php if (isset($_POST["username"]) && isset($_POST["password"])): ?>
	
			<?php

				$loggedin = '';
				$link = new mysqli('localhost', 'root', '', 'ewuscbb');
				require 'dbFunctionsEWUSCBB.php';
				$query = $link->prepare("SELECT * from user where username = ?");
				$query->bind_param("s", $_POST["username"]);
				$query->execute();

				$result = stmt_get_assoc($query);

				//hash the password
				$pass = hash("sha256", $_POST["password"]);

		
					foreach ($result as $key => $row) {
						if(strcmp($row["password"], $pass)==0)
							{

								$loggedin = true;
							}
						else
							$loggedin = false;
					}
			?>

		<?php if ($loggedin): ?>
			<center>
				<h1>You are logged in!</h1>
			</center>

			<?php
				//Set cookies to signify login, then redirect to landing page.
				setcookie("loggedin", "1");
				setcookie("username", $_POST["username"]);
				header( 'Location: index.php' );

			?>

		<?php else: ?>

			<center>
				<?php
				header( 'Location: login.php' );

			?>
			</center>

		<?php endif ?>

	<?php else: ?>
		<center>

		<h1>Oh no!</h1>
		<br><br>
		
		</center>	

	<?php endif ?>