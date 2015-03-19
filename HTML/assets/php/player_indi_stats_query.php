<?php
	$id  = (int)$_GET["id"];
	$db = new PDO('sqlite:assets/db/ewuscbb.db');

	$playerinfo = $db->query('select * from Player_Info where Player_ID = '.$id);
	$seasonoverview = $db->query('select  round(Points/Games_Played,1) as points, round(Assists/Games_Played,1) as assists, round(Rebounds/Games_Played,1) as rebounds, round(Steals/Games_Played,1) as steals from Player_Stats where Player_ID = '.$id);
	$seasonavgs = $db->query('select Games_Played, round(Points/Games_Played,1) as points, round(FGM*1.0/Games_Played,2) as fgm, round(FGA*1.0/Games_Played,2) as fga, round(TPM*1.0/Games_Played,2) as tpm, round(TPA*1.0/Games_Played,2) as tpa, round(FTM/Games_Played,2) as ftm, round(FTA/Games_Played,2) as fta, round(Assists/Games_Played,1) as assists, round(Steals/Games_Played,1) as steals, round(Rebounds/Games_Played,1) as rebounds, round(Blocks/Games_Played,1) as blocks from Player_Stats where Player_ID = '.$id);
	$seasontotals = $db->query('select * from Player_Stats where Player_ID = '.$id);


	function getPlayerInfo(){
		try
		  {
		  	global $playerinfo;
			//outputing data
		    foreach($playerinfo as $row)
		    {
		     
		     print "<div class='row'>".$row['First_Name']." ".$row['Last_Name']."</div>
     				<div class='row top-buffer'>".$row['Number'].", ".$row['Position']."</div>
     				<div class='row'>Team ".$row['Team']."</div>";
		    }
		  }
		  catch(PDOException $e)
		  {
		    print 'Exception : '.$e->getMessage();
		  }	
	}

	function getSeasonOverview(){
	try
	  {
	  	global $seasonoverview;
		//outputing data
		$i = 1;
	    foreach($seasonoverview as $row)
	    {
	    	print "<div class='row'>PTS <b>".$row['points']."</b></div>
     				<div class='row'>REB <b>".$row['rebounds']."</b></div>
     				<div class='row'>AST <b>".$row['assists']."</b></div>
     				<div class='row'>STL <b>".$row['steals']."</b></div>";
	    }
	  }
	  catch(PDOException $e)
	  {
	    print 'Exception : '.$e->getMessage();
	  }	
	}


		function getPerGame(){
		try
		  {
		  	global $seasonavgs;
			//outputing data
			$i = 1;
		    foreach($seasonavgs as $row)
		    {
		      $fgpct = 0.0;
		      $tppct = 0.0;
		      $ftpct = 0.0;
		      if($row['fga']!=0)
		      	$fgpct = round($row['fgm']/$row['fga'],3)*100;
		      if($row['tpa']!=0)
		      	$tppct = round($row['tpm']/$row['tpa'],3)*100;
		      if($row['fta']!=0)
		     	 $ftpct = round($row['ftm']/$row['fta'],3)*100;
		      print "<tr><td> Current </td>";
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
		      print "<td>".$row['blocks']."</td></tr>";
		    }
		  }
		  catch(PDOException $e)
		  {
		    print 'Exception : '.$e->getMessage();
		  }	
	}

	function getPerSeason(){
		try
		  {
		  	global $seasontotals;
			//outputing data
			$i = 1;
		    foreach($seasontotals as $row)
		    {
		      $fgpct = 0.0;
		      $tppct = 0.0;
		      $ftpct = 0.0;
		      if($row['FGA']!=0)
		      	$fgpct = round($row['FGM']/$row['FGA'],3)*100;
		      if($row['TPA']!=0)
		      	$tppct = round($row['TPM']/$row['TPA'],3)*100;
		      if($row['FTA']!=0)
		     	 $ftpct = round($row['FTM']/$row['FTA'],3)*100;
		      print "<tr><td> Current </td>";
		      print "<td>".(int)$row['Games_Played']."</td>";
		      print "<td>".(int)$row['Points']."</td>";
		      print "<td>".(int)$row['FGM']."</td>";
		      print "<td>".(int)$row['FGA']."</td>";
		      print "<td>".$fgpct."</td>";
		      print "<td>".(int)$row['TPM']."</td>";
		      print "<td>".(int)$row['TPA']."</td>";
		      print "<td>".$tppct."</td>";
		      print "<td>".(int)$row['FTM']."</td>";
		      print "<td>".(int)$row['FTA']."</td>";
		      print "<td>".$ftpct."</td>";
		      print "<td>".(int)$row['Assists']."</td>";
		      print "<td>".(int)$row['Steals']."</td>";
		      print "<td>".(int)$row['Rebounds']."</td>";
		      print "<td>".(int)$row['Blocks']."</td></tr>";
		    }
		  }
		  catch(PDOException $e)
		  {
		    print 'Exception : '.$e->getMessage();
		  }	
	}
?>