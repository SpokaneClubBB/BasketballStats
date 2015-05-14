
<?php
	
	if (isset($_POST['change']))
	{
		$new_conn = $_POST['change'];
		echo $new_conn;
	}
	else
	{
		$new_conn = 'sqlite:assets/db/ewuscbb1.db'
	}
	
	$new_db = new PDO($new_conn);

?>