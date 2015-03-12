<?php 	
		require_once 'header.php';
		require_once 'assets/php/player_stats_query.php';
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
	<body>

		<!--Player stats navbar -->
		<nav class="navbar navbar-inverse bodynav">
			<div class="container-fluid">
				<div class="row">
					<div class="navbar-header">
						<a class="navbar-brand brandtitle">Player Stats</a>
					</div>
					<ul class="nav navbar-nav navbar-right">
						<li class="space active" id="pergame_"><a href="#" onClick="leaderUpdate('per_')">PER GAME</a></li>
						<li class="space" id="totals_"><a href="#" onClick="leaderUpdate('season_')">TOTALS</a></li>
					</ul>
				</div>
			</div>
		</nav>

		<!-- Player stats per game- raw -  -->
		<div class="container-fluid" id ="ps_pergame" style="display:show">
			<div class = "text-center table-responsive"> 
		  		<div class="col leadcol">
					<table class="table table-condensed" id="player_stats_table">
						<thead>
							<tr class = "table_headers">
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
						<tbody id="ps_pergame_body">
							<?php getPerGame() ?>
					  	</tbody>						
		  			</table>
		  		</div>	
	  		</div>
		</div>

		<!-- Player stats season- raw -  -->
		<div class="container-fluid" id ="ps_season" style="display:none">
			<div class = "text-center table-responsive"> 
		  		<div class="col leadcol">
					<table class="table table-condensed" id="player_stats_table">
						<thead>
							<tr class = "table_headers">
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
						<tbody id="ps_pergame_body">
							<?php getSeason() ?>
					  	</tbody>						
		  			</table>
		  		</div>	
	  		</div>
		</div>


	</body>
</html>

<?php require_once 'footer.php';


