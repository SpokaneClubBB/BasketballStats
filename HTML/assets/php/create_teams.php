<?php


	function getAllPlayers($sid) {
		$dbm = new PDO('sqlite:assets/db/scbbmain.db');
		$playersall = $dbm->query("SELECT Player_ID, First_Name, Last_Name FROM Player_Stats ORDER BY Last_Name;");
		$dbm = null;		

		$db = new PDO('sqlite:assets/db/scbb' .$sid. '.db');
		$teamplayers = $db->query('SELECT Player_ID FROM Player_Info WHERE Team IS NOT NULL ORDER BY Last_Name;');
		$db = null;

		$current = array();
		foreach ($teamplayers as $row) {
			$current[] = $row['Player_ID'];
		}

		
		foreach ($playersall as $r1) {
			$unallocated = True;

			for ($i = 0; $i < count($current); ++$i) {
				if ($r1['Player_ID'] == $current[$i]) {
					$unallocated = False;
					break;
				}
			} 		    		
		    
			if ($unallocated) {
				print "<option value=".$r1['Player_ID'].">" .$r1["Last_Name"].  ", " .$r1["First_Name"]. "</option>";
			}
		}
	}



	function getTeams($sid) {
		$db = new PDO('sqlite:assets/db/scbb' .$sid. '.db');
		$teams = $db->query('select Team from Team_Stats');
		$db = null;

		$count = 0;


		foreach ($teams as $row) {
			if ($count % 3 == 0) {
				print "<tr>";
			}

			print "<td> <div class='players_container'><button class='btn btn-default to_team' onclick='toTeam(" .$row["Team"]. ")'> Add to Team "  .$row["Team"]. "</button>";
			print "<select id='team_" .$row["Team"].  "' class='player_select' size='10' multiple>";

			$db = new PDO('sqlite:assets/db/scbb' .$sid. '.db');
			$teamplayers = $db->query('SELECT Player_ID, First_Name, Last_Name, Position FROM Player_Info WHERE Team=' .$row["Team"]. ' ORDER BY Last_Name;');

			foreach ($teamplayers as $r1) {
				print "<option value=".$r1['Player_ID'].">" .$r1["Last_Name"].  ", " .$r1["First_Name"]. "</option>";
			}
			print "</select></div></td>";
			
			if (($count+1) % 3 == 0){
				print "</tr>";
			}
			$count++;
		}

		$db = null;

		if ($count % 3 == 0) {
			print "<tr>";
		}
		print "<td> <div class='players_container'><button id='add_team' onclick='addTeam()'>+</button></div></td>";
		if (($count+1) % 3 == 0){
			print "</tr>";
		}

		return $count;

	}

?>