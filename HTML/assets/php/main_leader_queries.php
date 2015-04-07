
<?php

	//executing queries on page load
	//player based leaders
	
	$db = new PDO('sqlite:assets/db/ewuscbb.db');
	$ppg = $db->query('select ps.First_Name, ps.Last_Name, Team, round(Points/Games_Played, 1) as PPG
			from Player_Stats as ps left outer join Player_Info as pi on ps.First_Name = 	pi.First_Name and ps.Last_Name = pi.Last_Name 
			order by PPG desc
			limit 5');
	$apg = $db->query('select ps.First_Name, ps.Last_Name, Team, round(Assists/Games_Played, 1) as APG
			from Player_Stats as ps left outer join Player_Info as pi on ps.First_Name = 	pi.First_Name and ps.Last_Name = pi.Last_Name 
			order by APG desc
			limit 5');
	$rpg = $db->query('select ps.First_Name, ps.Last_Name, Team, round(Rebounds/Games_Played, 1) as RPG
			from Player_Stats as ps left outer join Player_Info as pi on ps.First_Name = 	pi.First_Name and ps.Last_Name = pi.Last_Name 
			order by RPG desc
			limit 5');
	$spg = $db->query('select ps.First_Name, ps.Last_Name, Team, round(Steals/Games_Played, 1) as SPG
			from Player_Stats as ps left outer join Player_Info as pi on ps.First_Name = 	pi.First_Name and ps.Last_Name = pi.Last_Name 
			order by SPG desc
			limit 5');

	//team based leaders
	$tppg = $db->query('select Team, round(Points/Games_Played, 1) as PPG from Team_Stats order by PPG desc');
	$tapg = $db->query('select Team, round(Assists/Games_Played, 1) as APG from Team_Stats order by APG desc');
	$trpg = $db->query('select Team, round(Rebounds/Games_Played, 1) as RPG from Team_Stats order by RPG desc');
	$tspg = $db->query('select Team, round(Steals/Games_Played, 1) as SPG from Team_Stats order by SPG desc');
	//league standings
	$standings = $db->query('select Team, Games_Played, Wins, Losses, round(Wins*1.0/Games_Played,3) as pw from Team_Stats order by pw desc');

	//upcoming schedule
	$schedule = $db->query("select Home, Away, Date, Time from Schedule where Date >= date() order by Date asc");
	
	//top ten player based leaders
	$ppg2 = $db->query('select ps.First_Name, ps.Last_Name, Team, round(Points/Games_Played, 1) as PPG
			from Player_Stats as ps left outer join Player_Info as pi on ps.First_Name = 	pi.First_Name and ps.Last_Name = pi.Last_Name 
			order by PPG desc
			limit 10');
	$apg2 = $db->query('select ps.First_Name, ps.Last_Name, Team, round(Assists/Games_Played, 1) as APG
			from Player_Stats as ps left outer join Player_Info as pi on ps.First_Name = 	pi.First_Name and ps.Last_Name = pi.Last_Name 
			order by APG desc
			limit 10');
	$rpg2 = $db->query('select ps.First_Name, ps.Last_Name, Team, round(Rebounds/Games_Played, 1) as RPG
			from Player_Stats as ps left outer join Player_Info as pi on ps.First_Name = 	pi.First_Name and ps.Last_Name = pi.Last_Name 
			order by RPG desc
			limit 10');
	$spg2 = $db->query('select ps.First_Name, ps.Last_Name, Team, round(Steals/Games_Played, 1) as SPG
			from Player_Stats as ps left outer join Player_Info as pi on ps.First_Name = 	pi.First_Name and ps.Last_Name = pi.Last_Name 
			order by SPG desc
			limit 10');
	$bpg2 = $db->query('select ps.First_Name, ps.Last_Name, Team, round(Blocks/Games_Played, 1) as BPG
			from Player_Stats as ps left outer join Player_Info as pi on ps.First_Name = 	pi.First_Name and ps.Last_Name = pi.Last_Name 
			order by BPG desc
			limit 10');
	$tpp2 = $db->query('select ps.First_Name, ps.Last_Name, Team, (100*(round(TPM/TPA, 1))) as TPP
			from Player_Stats as ps left outer join Player_Info as pi on ps.First_Name = 	pi.First_Name and ps.Last_Name = pi.Last_Name 
			order by TPP desc
			limit 10');
	$ftp2 = $db->query('select ps.First_Name, ps.Last_Name, Team, (100*(round(FTM/FTA, 1))) as FTP
			from Player_Stats as ps left outer join Player_Info as pi on ps.First_Name = 	pi.First_Name and ps.Last_Name = pi.Last_Name 
			order by FTP desc
			limit 10');
	$fgp2 = $db->query('select ps.First_Name, ps.Last_Name, Team, (100*(round(FGM/FGA, 1))) as FGP
			from Player_Stats as ps left outer join Player_Info as pi on ps.First_Name = 	pi.First_Name and ps.Last_Name = pi.Last_Name 
			order by FGP desc
			limit 10');
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
		      //using the name to search database... need to look this one over again
		      print "<td><a href='#'>".$row['First_Name']." ".$row['Last_Name']."</a></td>";
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

	//load player ppg leaders top 10 for League Leader page
	function getPPG2(){
		  try
		  {
		    global $ppg2;
		  	//outputing data
			$i = 1;
		    foreach($ppg2 as $row)
		    {
		      print "<tr><td>".$i."</td>";
		      //using the name to search database... need to look this one over again
		      print "<td><a href='#'>".$row['First_Name']." ".$row['Last_Name']."</a></td>";
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
		      print "<td><a href ='#'>".$row['First_Name']." ".$row['Last_Name']."</a></td>";
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
	//load player apg leaders top 10 for League Leader page
	function getAPG2(){
		try
		  {
		  	global $apg2;
		  	//outputing data
			$i = 1;
		    foreach($apg2 as $row)
		    {
		      print "<tr><td>".$i."</td>";
		      print "<td><a href ='#'>".$row['First_Name']." ".$row['Last_Name']."</a></td>";
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
		      print "<td><a href='#'>".$row['First_Name']." ".$row['Last_Name']."</a></td>";
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
	//load player rpg leaders top 10 for League Leader page
	function getRPG2(){
		try
		  {
		  	global $rpg2;
			//outputing data
			$i = 1;
		    foreach($rpg2 as $row)
		    {
		      print "<tr><td>".$i."</td>";
		      print "<td><a href='#'>".$row['First_Name']." ".$row['Last_Name']."</a></td>";
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
		      print "<td><a href='#'>".$row['First_Name']." ".$row['Last_Name']."</a></td>";
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
	//load player spg leaders top 10 for League Leader page
	function getSPG2(){
		try
		  {
		  	global $spg2;
			//outputing data
			$i = 1;
		    foreach($spg2 as $row)
		    {
		      print "<tr><td>".$i."</td>";
		      print "<td><a href='#'>".$row['First_Name']." ".$row['Last_Name']."</a></td>";
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

	//load player bpg leaders top 10 for League Leader page
	function getBPG2(){
		  try
		  {
		    global $bpg2;
		  	//outputing data
			$i = 1;
		    foreach($bpg2 as $row)
		    {
		      print "<tr><td>".$i."</td>";
		      //using the name to search database... need to look this one over again
		      print "<td><a href='#'>".$row['First_Name']." ".$row['Last_Name']."</a></td>";
		      print "<td>Team ".$row['Team']."</td>";
		      print "<td><b>".$row['BPG']."</b></td></tr>";
		      $i++;
		    }


		  }
		  catch(PDOException $e)
		  {
		    print 'Exception : '.$e->getMessage();
		  }
	}

	//load player tp% leaders top 10 for League Leader page
	function getTPP2(){
		  try
		  {
		    global $tpp2;
		  	//outputing data
			$i = 1;
		    foreach($tpp2 as $row)
		    {
		      print "<tr><td>".$i."</td>";
		      //using the name to search database... need to look this one over again
		      print "<td><a href='#'>".$row['First_Name']." ".$row['Last_Name']."</a></td>";
		      print "<td>Team ".$row['Team']."</td>";
		      print "<td><b>".$row['TPP']."%</b></td></tr>";
		      $i++;
		    }


		  }
		  catch(PDOException $e)
		  {
		    print 'Exception : '.$e->getMessage();
		  }
	}
	//load player ftp% leaders top 10 for League Leader page
	function getFTP2(){
		  try
		  {
		    global $ftp2;
		  	//outputing data
			$i = 1;
		    foreach($ftp2 as $row)
		    {
		      print "<tr><td>".$i."</td>";
		      //using the name to search database... need to look this one over again
		      print "<td><a href='#'>".$row['First_Name']." ".$row['Last_Name']."</a></td>";
		      print "<td>Team ".$row['Team']."</td>";
		      print "<td><b>".$row['FTP']."%</b></td></tr>";
		      $i++;
		    }


		  }
		  catch(PDOException $e)
		  {
		    print 'Exception : '.$e->getMessage();
		  }
	}

	//load player fgp% leaders top 10 for League Leader page
	function getFGP2(){
		  try
		  {
		    global $fgp2;
		  	//outputing data
			$i = 1;
		    foreach($fgp2 as $row)
		    {
		      print "<tr><td>".$i."</td>";
		      //using the name to search database... need to look this one over again
		      print "<td><a href='#'>".$row['First_Name']." ".$row['Last_Name']."</a></td>";
		      print "<td>Team ".$row['Team']."</td>";
		      print "<td><b>".$row['FGP']."%</b></td></tr>";
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
		      print "<tr><td>".$i."</td>";
		      print "<td><a href = '#'>Team ".$row['Team']."</a></td>";
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
		      print "<tr><td>".$i."</td>";
		      print "<td><a href = '#'>Team ".$row['Team']."</a></td>";
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
		      print "<tr><td>".$i."</td>";
		      print "<td><a href = '#'>Team ".$row['Team']."</a></td>";
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
		      print "<tr><td>".$i."</td>";
		      print "<td><a href = '#'>Team ".$row['Team']."</a></td>";
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
		      print "<tr><td>".$i."</td>";
		      print "<td><a href = '#'>Team ".$row['Team']."</a></td>";
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
	