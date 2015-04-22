<?php

    $db = new PDO('sqlite:assets/db/ewuscbb.db');



    //creating array of teams
    $team_query = $db->query("select Team from Team_Stats");
    $team_list = array();
    foreach($team_query as $row)
    {
      array_push($team_list, $row['Team']);
    }

    //dynamically generating html per team
    foreach($team_list as $team){
      //team based per game info
      $tppg = $db->query('select Team, round(Points/Games_Played, 1) as PPG from Team_Stats order by PPG desc');
      $tapg = $db->query('select Team, round(Assists/Games_Played, 1) as APG from Team_Stats order by APG desc');
      $trpg = $db->query('select Team, round(Rebounds/Games_Played, 1) as RPG from Team_Stats order by RPG desc');
      $tspg = $db->query('select Team, round(Steals/Games_Played, 1) as SPG from Team_Stats order by SPG desc');
      $tbpg = $db->query('select Team, round(Blocks/Games_Played, 1) as BPG from Team_Stats order by BPG desc');

      //team schedule
      $schedule = $db->query('select t1.Game_ID, t1.Home, t1.Away, t1.Date, t1.Time, t2.PointsFor,t2.PointsAgst from Schedule t1 left join Team_Game_Stats t2 on t1.Game_ID = t2.Game_ID and t1.Home = t2.Team where T1.Home ='.$team.' or t1.Away ='.$team.' order by t1.Date asc');

      //points per game and ranking
      $ppg_rank = 1;
      $ppg = 0.0;
      foreach($tppg as $pg){
        if($pg['Team'] == $team){
          $ppg = $pg['PPG'];
          break;
        }
        $ppg_rank++;
      }

      //assists per game and ranking
      $apg_rank = 1;
      $apg = 0.0;
      foreach($tapg as $ag){
        if($ag['Team'] == $team){
          $apg = $ag['APG'];
          break;
        }
        $apg_rank++;
      }

      //rebounds per game and ranking
      $rpg_rank = 1;
      $rpg = 0.0;
      foreach($trpg as $rg){
        if($rg['Team'] == $team){
          $rpg = $rg['RPG'];
          break;
        }
        $rpg_rank++;
      }

      //steals per game and ranking
      $spg_rank = 1;
      $spg = 0.0;
      foreach($tspg as $sg){
        if($sg['Team'] == $team){
          $spg = $sg['SPG'];
          break;
        }
        $spg_rank++;
      }

      //blocks per game and ranking
      $bpg_rank = 1;
      $bpg = 0.0;
      foreach($tbpg as $bg){
        if($bg['Team'] == $team){
          $bpg = $bg['BPG'];
          break;
        }
        $bpg_rank++;
      }

      //gather players
      $player_query = $db->query('select Player_ID, Team, First_Name, Last_Name, Games_Played, round(Points/Games_Played,1) as points, round(FGM*1.0/Games_Played,2) as fgm, round(FGA*1.0/Games_Played,2) as fga, round(TPM*1.0/Games_Played,2) as tpm, round(TPA*1.0/Games_Played,2) as tpa, round(FTM/Games_Played,2) as ftm, round(FTA/Games_Played,2) as fta, round(Assists/Games_Played,1) as assists, round(Steals/Games_Played,1) as steals, round(Rebounds/Games_Played,1) as rebounds, round(Blocks/Games_Played,1) as blocks from Player_Stats natural join Player_Info where Team ='.$team);

      //team record
      $record = $db->query('select Wins, Losses, round(Wins*1.0/Games_Played,3) as pw from Team_Stats where Team = '.$team);




      //getting rank of team? may be a sql method of doing this.
      $rank_q = $db->query('select Team, round(Wins*1.0/Games_Played,3) as pw from Team_Stats order by pw desc');
      $rank = 1;
      foreach($rank_q as $row){
        if($row['Team'] == $team){
          break;
        }
        $rank++;
      }

      //team banner - team based info following
      print "<div class = 'container-fluid'>
                  <div class='row'>
                    <div class='text-center'>
                      <button type = 'button' class='btn btn-lg btn-primary btn-block' onClick = \"showTeam('".$team."')\">Team ".$team."</button>
                    </div>
                  </div>
              </div>


      <div class = 'container-fluid table-responsive' id = 't".$team."' style='display:none'>
        <table class='table table-condensed' id='player_stats_table'>
            <thead>
              <tr class = 'table_headers'>
                <th>Player</th>
                <th>GP</th>
                <th>PTS</th>
                <th>FGM</th>
                <th>FGA</th>
                <th>FG%</th>
                <th>TPM</th>
                <th>TPA</th>
                <th>TP%</th>
                <th>FTM</th>
                <th>FTA</th>
                <th>FT%</th>
                <th>AST</th>
                <th>STL</th>
                <th>REB</th>
                <th>BLK</th>
              </tr>
            </thead>
            <tbody id='team_".$team."_playerinfo'>
            <div class='row teamsubnav'>Season Stats</div>

            <div class='container-fluid' id='averagestats'>
        			<div class='row'>

        			     <div class='col-sm-0 col-md-2 col-lg-3'></div>
        			     <div class='col-sm-6 col-md-4 col-lg-3' id='playerinfo'>
        			     	<div class = 'text-center padding'>";



      //team record and ranking
      foreach($record as $row){
          print "<div class = 'row'>#".$rank." Overall </div>
      				<div class='row'>".$row['Wins']."W - ".$row['Losses']."L </div>";
      }
             				print "</div>
        			     </div>
        			     <div class='col-sm-6 col-md-4 col-lg-3' id='avgplayerstats'>
        			     	<div class = 'col'>
        			     		<div class = 'text-center medium-font'>
                        <div class='row'>PPG <b>".$ppg."</b> #".$ppg_rank."</div>
                        <div class='row'>APG <b>".$apg."</b> #".$apg_rank."</div>
                        <div class='row'>RPG <b>".$rpg."</b> #".$rpg_rank."</div>
                        <div class='row'>SPG <b>".$spg."</b> #".$spg_rank."</div>
                        <div class='row'>BPG <b>".$bpg."</b> #".$bpg_rank."</div>
        	     				</div>
        	     			</div>
        			     </div>
          			     <div class='col-sm-0 col-md-2 col-lg-3'></div>
        		    </div>
        		</div>
            <div class='row teamsubnav'>Roster</div>";

      //player based stats for team
      foreach($player_query as $row){
          $fgpct = 0.0;
		      $tppct = 0.0;
		      $ftpct = 0.0;
		      if($row['fga']!=0)
		      	$fgpct = round($row['fgm']/$row['fga'],3)*100;
		      if($row['tpa']!=0)
		      	$tppct = round($row['tpm']/$row['tpa'],3)*100;
		      if($row['fta']!=0)
		     	 $ftpct = round($row['ftm']/$row['fta'],3)*100;
		      print "<tr><td><a href = player_indi_stats.php?id=".$row['Player_ID'].">".$row['First_Name']." ".$row['Last_Name']."</a></td>";
		      print "<td>".(int)$row['Games_Played']."</td>";
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

      print "</tbody>
          </table>
          <div class='row teamsubnav'>Schedule</div>
          <table class='table table-hover' id='schedule'>
            <thead>
              <tr class = 'table_headers'>
                <th>Opponent</th>
                <th>Date</th>
                <th>Time</th>
              </tr>
            </thead>
            <tbody id='schedule_body'>";

            //print schedule
            foreach($schedule as $row){
              $opponent = $row['Home'];
              if($opponent==$team){
                $opponent = $row['Away'];
              }else{
                $opponent = "@".$opponent;
              }
              print "<tr><td>".$opponent."</td>
                    <td>".$row['Date']."</td>
                    <td>".$row['Time']."</td>
                    <td><a href='#' onClick='boxscore(".$row['Game_ID'].")'><b>".$row['PointsFor']."-".$row['PointsAgst']."</b></a></td>";
            }


            print " </tbody>
            </table>

        </div>";
    }

?>
