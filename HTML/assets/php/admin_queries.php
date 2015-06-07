<?php
include 'proper_season_db.php';

	function getSchedule(){
		try
		{
			$sid = 0;
			if(isset($_GET["sid"]))
			  $sid  = (int)$_GET["sid"];
			  $dbString = getDB();
			  $db = new PDO('sqlite:assets/db/'.$dbString);
			$games = $db->query('SELECT Game_ID, Home, Away, Date, Time FROM Schedule');
			$db = NULL;

			foreach($games as $row)
			{
		
			print "<tr><td>".$row['Game_ID']. "</a></td>";
			  print "<td contenteditable = 'true'>".(int)$row['Home']. "</td>";
			  print "<td contenteditable = 'true'>".(int)$row['Away']. "</td>";
			  print "<td contenteditable = 'true'>".$row['Date']."</td>";
			  print "<td contenteditable = 'true'>".$row['Time']."</td>";
			  print "<td class='deleteGame'><span class='glyphicon glyphicon-remove'></span></td></tr>";
			  
			  
			}
		}
		catch(PDOException $e)
		{
			print 'Exception : '.$e->getMessage();
		}		
	}

	function getGameHistory()
	{
		try
		{
			$sid = 0;
			if(isset($_GET["sid"]))
			  $sid  = (int)$_GET["sid"];
			  $dbString = getDB();
			  $db = new PDO('sqlite:assets/db/'.$dbString);
			$games = $db->query('SELECT Game_ID, Home, Away, Date, Time FROM Schedule');
			$db = NULL;

			foreach($games as $row)
			{
			  if($sid==0)
			 	 print "<tr><td><a href = admin_edit_game.php?id=".$row['Game_ID'].">" .$row['Game_ID']. "</a></td>";
			  else
			 	 print "<tr><td><a href = admin_edit_game.php?id=".$row['Game_ID']."&sid=".$sid.">" .$row['Game_ID']. "</a></td>";
			  print "<td>".(int)$row['Home']. "</td>";
			  print "<td>".(int)$row['Away']. "</td>";
			  print "<td>".$row['Date']."</td>";
			  print "<td>".$row['Time']."</td></tr>";
			}
		}
		catch(PDOException $e)
		{
			print 'Exception : '.$e->getMessage();
		}		
	}

// consolidate into 1 query?
	function getHomeStats()
	{
		$id  = (int)$_GET["id"];

		  $dbString = getDB();
		  $db = new PDO('sqlite:assets/db/'.$dbString);
		$game = $db->query("SELECT First_Name, Last_Name, Points, FGM, FGA, TPM, TPA, FTM, FTA, Assists, Steals, Rebounds, Blocks FROM Player_Info join Schedule ON Team = Schedule.Home left outer join Player_Game_Stats on Schedule.Game_ID = Player_Game_Stats.Game_ID and Player_Game_Stats.Player_ID = Player_Info.Player_ID WHERE Schedule.Game_ID = " .$id);
		$db = NULL;

		foreach($game as $row)
		{
			  print "<tr><td>".$row['First_Name']. " " .$row['Last_Name']. "</td>";
		      print "<td>".$row['Points']."</td>";
		      print "<td>".$row['FGM']."</td>";
		      print "<td>".$row['FGA']."</td>";
		      print "<td>".$row['TPM']."</td>";
		      print "<td>".$row['TPA']."</td>";
		      print "<td>".$row['FTM']."</td>";
		      print "<td>".$row['FTA']."</td>";
		      print "<td>".$row['Assists']."</td>";
		      print "<td>".$row['Steals']."</td>";
		      print "<td>".$row['Rebounds']."</td>";
		      print "<td>".$row['Blocks']."</td></tr>";
		}
	}

	function getGameStats()
	{
		$id  = (int)$_GET["id"];
		  $dbString = getDB();
		  $db = new PDO('sqlite:assets/db/'.$dbString);
		$game = $db->query("SELECT First_Name, Last_Name, Points, FGM, FGA, TPM, TPA, FTM, FTA, Assists, Steals, Rebounds, Blocks FROM Player_Info join Schedule ON Team = Schedule.Home OR Team = Schedule.Away left outer join Player_Game_Stats on Schedule.Game_ID = Player_Game_Stats.Game_ID and Player_Game_Stats.Player_ID = Player_Info.Player_ID WHERE Schedule.Game_ID = " .$id);
		$db = NULL;

		$stats = array();
		foreach($game as $row)
		{
			 $stats[] = $row;
		}
		echo json_encode($stats);
	}

	function getAwayStats()
	{
		$id  = (int)$_GET["id"];
		  $dbString = getDB();
		  $db = new PDO('sqlite:assets/db/'.$dbString);
		$game = $db->query("SELECT First_Name, Last_Name, Points, FGM, FGA, TPM, TPA, FTM, FTA, Assists, Steals, Rebounds, Blocks FROM Player_Info join Schedule ON Team = Schedule.Away left outer join Player_Game_Stats on Schedule.Game_ID = Player_Game_Stats.Game_ID and Player_Game_Stats.Player_ID = Player_Info.Player_ID WHERE Schedule.Game_ID = " .$id);
		
		$db = NULL;

		foreach($game as $row)
		{
			  print "<tr><td>".$row['First_Name']. " " .$row['Last_Name']. "</td>";
		      print "<td>".$row['Points']."</td>";
		      print "<td>".$row['FGM']."</td>";
		      print "<td>".$row['FGA']."</td>";
		      print "<td>".$row['TPM']."</td>";
		      print "<td>".$row['TPA']."</td>";
		      print "<td>".$row['FTM']."</td>";
		      print "<td>".$row['FTA']."</td>";
		      print "<td>".$row['Assists']."</td>";
		      print "<td>".$row['Steals']."</td>";
		      print "<td>".$row['Rebounds']."</td>";
		      print "<td>".$row['Blocks']."</td></tr>";
		}
	}

	function getPlayers() 
	{
		try
		{
			  $dbString = getDB();
			  $db = new PDO('sqlite:assets/db/'.$dbString);
			$games = $db->query('SELECT Player_ID, Last_Name, First_Name FROM Player_Info');
			$db = NULL;

			foreach($games as $row)
			{
				print '<tr onclick="admin_edit_player.php?id=' .$row['Player_ID']. '"><td>' .$row['Last_Name']. '</td>';
			  	print "<td>" .$row['First_Name']. "</a></td></tr>";
			  	//print "<tr><td><a href = admin_edit_player.php?id=" .$row['Player_ID']. ">" .$row['Last_Name']. "</a></td>";
			  //	print "<td><a href = admin_edit_player.php?id=" .$row['Player_ID']. ">" .$row['First_Name']. "</a></td></tr>";
			}
		}
		catch(PDOException $e)
		{
			print 'Exception : '.$e->getMessage();
		}		
	}


	function getSeasonsAdmin() 
	{
		try
		{

			$db = new PDO('sqlite:assets/db/scbbmain.db');
			//seasons query
			$seasons = $db->query('select Season from Seasons');
			$db = null;

			foreach($seasons as $row){
				$sid = $row['Season'];
				print "<tr id=" .$sid. "><td><a href = admin_manage_season.php?id=" .$sid. ">" .$sid. "</a></td>";

				$db_dates = new PDO('sqlite:assets/db/scbb'.$sid.'.db');

				$dates = $db_dates->query('select MIN(Date), MAX(Date) from Schedule;');
				$row1 = $dates->fetch(PDO::FETCH_BOTH);

				print "<td>" .$row1[0]. "</td>";
				print "<td>" .$row1[1]. "</td>";
			    print "<td class='removeSeason'><span class='glyphicon glyphicon-remove'></span></td></tr>";

			}

		 	$sid++;
		 	print "<tr class='add_row'><td><form action='admin_manage_season.php?id=" .$sid. "' method='post'> <button class='btn btn-default'><span class='glyphicon glyphicon-plus' aria-hidden='true'></span>  New Season</button> </form></td><td></td><td></td><td></tr>";
		}
		catch(PDOException $e)
		{
			print 'Exception : '.$e->getMessage();
		}		
	}
?>

