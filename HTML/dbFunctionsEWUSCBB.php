<?php
//grab stats for all player
	function getAllStats($mysqli)
	{
		$stmt = "SELECT * from `player stats`";
		
		$stmt = $mysqli->prepare($stmt);

		$stmt->execute();

		$result = stmt_get_assoc($stmt);

		return $result;

	}
?>