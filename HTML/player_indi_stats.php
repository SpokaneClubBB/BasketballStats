<?php 	
	require_once 'header.php';
	require_once 'assets/php/player_indi_stats_query.php';
	if((int)$_GET["id"]==0){
		print "<div class = 'container'>
				<div class = 'text-center'>
					<h1>Not a valid player</h1>
				</div>
			   </div>";
		
	}
		
?>

<html lang="en">
	<head>
		<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700|Oswald:400,700|Open+Sans' rel='stylesheet' type='text/css'>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Spokane Club recreational basketball league individual player statistics">
		<meta name="author" content="Nathan Tonani">

		<title>Spokane Club</title>

		<!-- page spec css -->
		<link href="assets/css/individualstats.css" rel="stylesheet">
		<!-- pergame vs season js-->
		<script src="assets/js/playerstats_statdeterm.js"></script>

	</head>
	<body id="player_body">

		<div class="container-fluid" id="averagestats">
			<div class="row">
			<!-- this is not good, but I couldn't find out how to get just 2 columns centered, so I put 4 columns total so the spacing looks good-->
			     <div class="col-sm-0 col-md-2 col-lg-3"></div>
			     <div class="col-sm-6 col-md-4 col-lg-3" id="playerinfo">
			     	<div class = "text-center">
     					<?php getPlayerInfo() ?>
     				</div>
			     </div>
			     <div class="col-sm-6 col-md-4 col-lg-3" id="avgplayerstats">
			     	<div class = "col">
			     		<div class = "text-center">
	     					<?php getSeasonOverview() ?>
	     				</div>
	     			</div>
			     </div>
  			     <div class="col-sm-0 col-md-2 col-lg-3"></div>
		    </div>
		</div>

		<!--Navbar Player Stats-->
		<nav class="navbar navbar-inverse bodynav">
			<div class="container-fluid">
				<div class="row">
					<div class="navbar-header">
						<a class="navbar-brand brandtitle">Player Stats</a>
					</div>
					<ul class="nav navbar-nav navbar-right">
						<li class="space active" id="pergame_"><a onClick="leaderUpdate('per_')">PER GAME</a></li>
						<li class="space" id="totals_"><a onClick="leaderUpdate('season_')">TOTALS</a></li>
					</ul>
				</div>
			</div>
		</nav>

		<div class="container-fluid" id = "ps_pergame" style = "display:show">
			<table class="table table-condensed" id="game_stats">
				<thead>
					<tr >
						<th>Season</th>
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
				<tbody id="pstats_body">
					<?php getPerGame() ?>
			  	</tbody>						
  			</table>	
		</div>

		<div class="container-fluid" id="ps_season" style="display:none">
			<table class="table table-condensed" id="season_stats">
				<thead>
					<tr >
						<th>Season</th>
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
				<tbody id="pstats_body">
					<?php getPerSeason() ?>
			  	</tbody>						
  			</table>	
		</div>



				<!--Navbar Past Games-->
		<nav class="navbar navbar-inverse bodynav">
			<div class="container-fluid">
				<div class="row">
					<div class="navbar-header">
						<a class="navbar-brand brandtitle">Game Logs</a>
					</div>
					<ul class="nav navbar-nav navbar-right">
						<div class="dropdown">
						  <button class="btn btn-default dropdown-toggle" type="button" id="season_dropdown" data-toggle="dropdown" aria-expanded="true">
						    Season 2
						    <span class="caret"></span>
						  </button>
						  <ul class="dropdown-menu" role="menu">
						    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Season 1</a></li>
						    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Season 2</a></li>
						  </ul>
						</div>

					</ul>
				</div>
			</div>
		</nav>
	</body>
	<?php require_once 'footer.php';?>