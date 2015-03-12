
<?php

	$db = new PDO('sqlite:assets/db/ewuscbb.db');

	//player per game
	$pergame = $db->query('select First_Name, Last_Name, Games_Played, round(Points/Games_Played,1) as points, round(FGM*1.0/Games_Played,2) as fgm, round(FGA*1.0/Games_Played,2) as fga, round(TPM*1.0/Games_Played,2) as tpm, round(TPA*1.0/Games_Played,2) as tpa, round(FTM/Games_Played,2) as ftm, round(FTA/Games_Played,2) as fta, round(Assists/Games_Played,1) as assists, round(Steals/Games_Played,1) as steals, round(Rebounds/Games_Played,1) as rebounds, round(Blocks/Games_Played,1) as blocks from Player_Stats');
	//player season totals
	$season = $db->query('select * from Player_Stats');

	//closing db
	$db = NULL;

	
	//load pergame
	function getPerGame(){
		try
		  {
		  	global $pergame;
			//outputing data
			$i = 1;
		    foreach($pergame as $row)
		    {
		      $fgpct = round($row['fgm']/$row['fga'],1)*100;
		      $tppct = round($row['tpm']/$row['tpa'],1)*100;
		      $ftpct = round($row['ftm']/$row['fta'],1)*100;
		      print "<tr><td><a href = '#'>".$row['First_Name']." ".$row['Last_Name']."</a></td>";
		      print "<td>".$row['Games_Played']."</td>";
		      print "<td>".$row['points']."</td>";
		      print "<td>".$row['fgm']."</td>";
		      print "<td>".$row['fga']."</td>";
		      print "<td>".$fgpct."</td>";
		      print "<td>".$row['tpm']."</td>";
		      print "<td>".$row['tpa']."</td>";
		      print "<td>".$tppct."</td>";
		      print "<td>".$row['ftm']."</td>";
		      print "<td>".$row['fta']."</td>";
		      print "<td>".$ftpct."</td>";
		      print "<td>".$row['assists']."</td>";
		      print "<td>".$row['steals']."</td>";
		      print "<td>".$row['rebounds']."</td>";
		      print "<td>".$row['blocks']."</td>";
		    }
		  }
		  catch(PDOException $e)
		  {
		    print 'Exception : '.$e->getMessage();
		  }	
	}
	//load season
	function getSeason(){
		try
		  {
		  	global $season;
			//outputing data
			$i = 1;
		    foreach($season as $row)
		    {
		      $fgpct = round($row['FGM']/$row['FGA'],3)*100;
		      $tppct = round($row['TPM']/$row['TPA'],3)*100;
		      $ftpct = round($row['FTM']/$row['FTA'],3)*100;
		      print "<tr><td><a href = '#'>".$row['First_Name']." ".$row['Last_Name']."</a></td>";
		      print "<td>".$row['Games_Played']."</td>";
		      print "<td>".$row['Points']."</td>";
		      print "<td>".$row['FGM']."</td>";
		      print "<td>".$row['FGA']."</td>";
		      print "<td>".$fgpct."</td>";
		      print "<td>".$row['TPM']."</td>";
		      print "<td>".$row['TPA']."</td>";
		      print "<td>".$tppct."</td>";
		      print "<td>".$row['FTM']."</td>";
		      print "<td>".$row['FTA']."</td>";
		      print "<td>".$ftpct."</td>";
		      print "<td>".$row['Assists']."</td>";
		      print "<td>".$row['Steals']."</td>";
		      print "<td>".$row['Rebounds']."</td>";
		      print "<td>".$row['Blocks']."</td>";
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
	