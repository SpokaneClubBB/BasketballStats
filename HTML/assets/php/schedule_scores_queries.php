
<?php

	//$schedule = $db->query('select Home, Away, Date, Time from Schedule where DATE(Date) >= DATE(NOW()) order by Date asc');
	$db = new PDO('sqlite:assets/db/ewuscbb.db');
	$schedule = $db->query("select t1.Game_ID, t1.Home, t1.Away, t1.Date, t1.Time, t2.PointsFor,t2.PointsAgst from Schedule t1 left join Team_Game_Stats t2 on t1.Game_ID = t2.Game_ID and t1.Home = t2.Team order by t1.Date asc");

	//$schedule = $db->query('select t1.Home from Schedule t1 right join Team_Game_Stats t2 on t1.Home = t2.Team and t1.Date = t2.Date');
	//league standings
	$standings = $db->query('select Team, Games_Played, Wins, Losses, round(Wins*1.0/Games_Played,3) as pw from Team_Stats order by pw desc');

	//closing db
	$db = NULL;

	
	//load standings
	function getStandings_ss(){
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

	function getSchedule_ss(){
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
			      print "<td><a href='#' onClick='boxscore(".$row['Game_ID'].")'><b>".$row['PointsFor']."-".$row['PointsAgst']."</b></a></td>";
			   
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
	