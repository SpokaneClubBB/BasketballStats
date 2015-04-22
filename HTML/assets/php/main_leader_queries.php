
<?php

	//executing queries on page load
	//player based leaders

	$db = new PDO('sqlite:assets/db/ewuscbb.db');
	$ppg = $db->query('select pi.Player_ID, ps.First_Name, ps.Last_Name, Team, round(Points/Games_Played, 1) as PPG
			from Player_Stats as ps left outer join Player_Info as pi on ps.First_Name = 	pi.First_Name and ps.Last_Name = pi.Last_Name
			order by PPG desc
			limit 5');
	$apg = $db->query('select pi.Player_ID, ps.First_Name, ps.Last_Name, Team, round(Assists/Games_Played, 1) as APG
			from Player_Stats as ps left outer join Player_Info as pi on ps.First_Name = 	pi.First_Name and ps.Last_Name = pi.Last_Name
			order by APG desc
			limit 5');
	$rpg = $db->query('select pi.Player_ID, ps.First_Name, ps.Last_Name, Team, round(Rebounds/Games_Played, 1) as RPG
			from Player_Stats as ps left outer join Player_Info as pi on ps.First_Name = 	pi.First_Name and ps.Last_Name = pi.Last_Name
			order by RPG desc
			limit 5');
	$spg = $db->query('select pi.Player_ID, ps.First_Name, ps.Last_Name, Team, round(Steals/Games_Played, 1) as SPG
			from Player_Stats as ps left outer join Player_Info as pi on ps.First_Name = 	pi.First_Name and ps.Last_Name = pi.Last_Name
			order by SPG desc
			limit 5');

	//team based leaders
	$tppg = $db->query('select Team, round(Points/Games_Played, 1) as PPG from Team_Stats order by PPG desc limit 5');
	$tapg = $db->query('select Team, round(Assists/Games_Played, 1) as APG from Team_Stats order by APG desc limit 5');
	$trpg = $db->query('select Team, round(Rebounds/Games_Played, 1) as RPG from Team_Stats order by RPG desc limit 5');
	$tspg = $db->query('select Team, round(Steals/Games_Played, 1) as SPG from Team_Stats order by SPG desc limit 5');
	//league standings
	$standings = $db->query('select Team, Games_Played, Wins, Losses, round(Wins*1.0/Games_Played,3) as pw from Team_Stats order by pw desc');

	//upcoming schedule
	$schedule = $db->query("select Home, Away, Date, Time from Schedule where Date >= date() order by Date asc");



	//closing db
	$db = NULL;

	//load player ppg leaders
	function getPPG(){
		  try
		  {
		    global $ppg;
		  	//outputing data
			$i = 1;
		    foreach($ppg as $row)
		    {
		      print "<tr><td>".$i."</td>";
		      print "<td><a href = player_indi_stats.php?id=".$row['Player_ID'].">".$row['First_Name']." ".$row['Last_Name']."</a></td>";
		      print "<td>Team ".$row['Team']."</td>";
		      print "<td><b>".$row['PPG']."</b></td></tr>";
		      $i++;
		    }


		  }
		  catch(PDOException $e)
		  {
		    print 'Exception : '.$e->getMessage();
		  }
	}

	//load player apg leaders
	function getAPG(){
		try
		  {
		  	global $apg;
		  	//outputing data
			$i = 1;
		    foreach($apg as $row)
		    {
		      print "<tr><td>".$i."</td>";
		      print "<td><a href = player_indi_stats.php?id=".$row['Player_ID'].">".$row['First_Name']." ".$row['Last_Name']."</a></td>";
		      print "<td>Team ".$row['Team']."</td>";
		      print "<td><b>".$row['APG']."</b></td>";
		      $i++;
		    }

		  }
		  catch(PDOException $e)
		  {
		    print 'Exception : '.$e->getMessage();
		  }

	}

	//load player rpg leaders
	function getRPG(){
		try
		  {
		  	global $rpg;
			//outputing data
			$i = 1;
		    foreach($rpg as $row)
		    {
		      print "<tr><td>".$i."</td>";
		      print "<td><a href = player_indi_stats.php?id=".$row['Player_ID'].">".$row['First_Name']." ".$row['Last_Name']."</a></td>";
		      print "<td>Team ".$row['Team']."</td>";
		      print "<td><b>".$row['RPG']."</b></td></tr>";
		      $i++;
		    }
		  }
		  catch(PDOException $e)
		  {
		    print 'Exception : '.$e->getMessage();
		  }
	}

	//load player spg leaders
	function getSPG(){
		try
		  {
		  	global $spg;
			//outputing data
			$i = 1;
		    foreach($spg as $row)
		    {
		      print "<tr><td>".$i."</td>";
		      print "<td><a href = player_indi_stats.php?id=".$row['Player_ID'].">".$row['First_Name']." ".$row['Last_Name']."</a></td>";
		      print "<td>Team ".$row['Team']."</td>";
		      print "<td><b>".$row['SPG']."</b></td>";
		      $i++;
		    }
		  }
		  catch(PDOException $e)
		  {
		    print 'Exception : '.$e->getMessage();
		  }
	}


	//load team ppg leaders
	function teamPPG(){
		try
		  {
		  	global $tppg;
			//outputing data
			$i = 1;
		    foreach($tppg as $row)
		    {
					$team = $row['Team'];
		      print "<tr><td>".$i."</td>";
		      print "<td><a href = 'team_info_page.php?tid=".$team."'>Team ".$team."</a></td>";
		      print "<td><b>".$row['PPG']."</b></td></tr>";
		      $i++;
		    }
		  }
		  catch(PDOException $e)
		  {
		    print 'Exception : '.$e->getMessage();
		  }
	}

	//load team apg leaders
	function teamAPG(){
		try
		  {
		  	global $tapg;
			//outputing data
			$i = 1;
		    foreach($tapg as $row)
		    {
					$team = $row['Team'];
		      print "<tr><td>".$i."</td>";
		      print "<td><a href = 'team_info_page.php?tid=".$team."'>Team ".$team."</a></td>";
		      print "<td><b>".$row['APG']."</b></td>";
		      $i++;
		    }
		  }
		  catch(PDOException $e)
		  {
		    print 'Exception : '.$e->getMessage();
		  }
	}

	//load team rpg leaders
	function teamRPG(){
		try
		  {
		  	global $trpg;
			//outputing data
			$i = 1;
		    foreach($trpg as $row)
		    {
					$team = $row['Team'];
		      print "<tr><td>".$i."</td>";
		      print "<td><a href = 'team_info_page.php?tid=".$team."'>Team ".$team."</a></td>";
		      print "<td><b>".$row['RPG']."</b></td></tr>";
		      $i++;
		    }
		  }
		  catch(PDOException $e)
		  {
		    print 'Exception : '.$e->getMessage();
		  }
	}

	//load team spg leaders
	function teamSPG(){
		try
		  {
		  	global $tspg;
			//outputing data
			$i = 1;
		    foreach($tspg as $row)
		    {
					$team = $row['Team'];
		      print "<tr><td>".$i."</td>";
		      print "<td><a href = 'team_info_page.php?tid=".$team."'>Team ".$team."</a></td>";
		      print "<td><b>".$row['SPG']."</b></td>";
		      $i++;
		    }
		  }
		  catch(PDOException $e)
		  {
		    print 'Exception : '.$e->getMessage();
		  }
	}



	/*

	These need to be moved?

	*/

	//load standings
	function getStandings(){
		try
		  {
		  	global $standings;
			//outputing data
			$i = 1;
		    foreach($standings as $row)
		    {
		      $pw = $row['pw']*100;
					$team = $row['Team'];
					print "<tr><td>".$i."</td>";
					print "<td><a href = 'team_info_page.php?tid=".$team."'>Team ".$team."</a></td>";
		      print "<td>".$row['Wins']."</td>";
		      print "<td>".$row['Losses']."</td>";
		      print "<td>".$pw."%</td>";
		      $i++;
		    }
		  }
		  catch(PDOException $e)
		  {
		    print 'Exception : '.$e->getMessage();
		  }
	}

	function getSchedule(){
		try
		  {
		  	global $schedule;

			//outputing data
		    foreach($schedule as $row)
		    {

			      print "<tr><td>Team ".$row['Home']."</td>";
			      print "<td>Team ".$row['Away']."</td>";
			      print "<td>".$row['Date']."</td>";
			      print "<td>".$row['Time']."</td>";

		    }
		  }
		  catch(PDOException $e)
		  {
		    print 'Exception : '.$e->getMessage();
		  }
	}
  /* --PRINTS NAMES OF ALL TABLES IN DB FILE--
    $db = new SQLite3('assets/db/ewuscbb.db');
    $tablesquery = $db->query("SELECT name FROM sqlite_master WHERE type='table';");

    while ($table = $tablesquery->fetchArray(SQLITE3_ASSOC)) {
        echo $table['name'] . '<br />';
    }*/
?>
