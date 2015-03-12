<?php 	
		require_once 'header.php';
		require_once 'assets/php/main_leader_queries.php';
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

		<!-- team/player leaders js -->
		<script src="assets/js/main_leaders.js"></script>


	</head>
	<body>
		<!--League leaders navbar title -->
		<nav class="navbar navbar-inverse bodynav">
			<div class="container-fluid">
				<div class="row">
					<div class="navbar-header">
						<a class="navbar-brand brandtitle" href="#">League Leaders</a>
					</div>
					<ul class="nav navbar-nav navbar-right">
						<li class="space active" id="player_"><a href="#" onClick="leaderUpdate('player_')">Players</a></li>
						<li class="space" id="team_"><a href="#" onClick="leaderUpdate('team_')">Teams</a></li>
					</ul>
				</div>
			</div>
		</nav>

		<!-- Player League Leaders main -->
		<div class="container-fluid" id ="player_leaders" style="display:show">
			<div class = "text-center"> 
				<!--Points per game-->
				<div class="col-lg-5 col-md-5 leadcol">
					<div class="col_header">
						<a href="#">POINTS PER GAME</a>
					</div>

					<table class="table table-hover" id="points_leaders">
						<tbody id="points_leaders_body">
							<?php getPPG() ?>

					  	</tbody>						
		  			</table>
		  		</div>	
		  		<!-- Rebounds per game -->
		  		<div class="col-lg-5 col-md-5 leadcol">
					<table class="table table-hover" id="rebounds_leaders">
						<div class="col_header">
							<a href="#">REBOUNDS PER GAME</a>
						</div>
						<tbody id="rebounds_leaders_body">
							<?php getRPG()?>
					  	</tbody>						
		  			</table>
		  		</div>	
		  	
		  		<!-- Assists per game -->
		  		<div class="col-lg-5 col-md-5 leadcol">
					<table class="table table-hover" id="assists_leaders">
						<div class="col_header">
							<a href="#">ASSISTS PER GAME</a>
						</div>
						<tbody id="assists_leaders_body">
							<?php getAPG() ?>
					  	</tbody>						
		  			</table>
		  		</div>

				<!-- Steals per game -->
		  		<div class="col-lg-5 col-md-5 leadcol">
					<table class="table table-hover" id="steals_leaders">
						<div class="col_header">
							<a href="#">STEALS PER GAME</a>
						</div>
						<tbody id="steals_leaders_body">
							<?php getSPG() ?>
					  	</tbody>						
		  			</table>
		  		</div>	
	  		</div>
		</div>

			<!-- Team league leaders main -->
		<div class="container-fluid" id ="team_leaders" style="display:none">
			<div class = "text-center"> 
				<!--Points per game-->
				<div class="col-lg-4 col-md-5 col-sm-5 leadcol">
					<div class="col_header">
						<a href="#">POINTS PER GAME</a>
					</div>

					<table class="table table-hover" id="points_leaders">
						<tbody id="points_leaders_body">
							<?php teamPPG() ?>

					  	</tbody>						
		  			</table>
		  		</div>	
		  		<!-- Rebounds per game -->
		  		<div class="col-lg-4 col-md-5 col-sm-5 leadcol">
					<table class="table table-hover" id="rebounds_leaders">
						<div class="col_header">
							<a href="#">REBOUNDS PER GAME</a>
						</div>
						<tbody id="rebounds_leaders_body">
							<?php teamRPG() ?>
					  	</tbody>						
		  			</table>
		  		</div>	
		  	
		  		<!-- Assists per game -->
		  		<div class="col-lg-4 col-md-5 col-sm-5 leadcol">
					<table class="table table-hover" id="assists_leaders">
						<div class="col_header">
							<a href="#">ASSISTS PER GAME</a>
						</div>
						<tbody id="assists_leaders_body">
							<?php teamAPG() ?>
					  	</tbody>						
		  			</table>
		  		</div>

				<!-- Steals per game -->
		  		<div class="col-lg-4 col-md-5 col-sm-5 leadcol">
					<table class="table table-hover" id="steals_leaders">
						<div class="col_header">
							<a href="#">STEALS PER GAME</a>
						</div>
						<tbody id="steals_leaders_body">
							<?php teamSPG() ?>
					  	</tbody>						
		  			</table>
		  		</div>	
	  		</div>
		</div>

		<!--League Info navbar title -->
		<nav class="navbar navbar-inverse bodynav">
			<div class="container-fluid">
				<div class="row">
					<div class="navbar-header">
						<a class="navbar-brand brandtitle" href="schedule_scores.php">League Info</a>
					</div>
				</div>
			</div>
		</nav>

		<!-- League Info main -->
		<div class="container-fluid" id ="league_info_main">
			<div class = "text-center"> 
				<!--Current Standings-->
				<div class="col-lg-4 col-md-4 leadcol">
					<div class="col_header">
						<a href="#">STANDINGS</a>
					</div>

					<table class="table table-hover" id="standings">
						<tbody id="standings_body">
							<?php getStandings() ?>
					  	</tbody>						
		  			</table>
		  		</div>	
		  		<!-- Upcoming Schedule -->
		  		<div class="col-lg-4 col-md-4 leadcol">
					<table class="table table-hover" id="upcoming_schedule">
						<div class="col_header">
							<a href="#">UPCOMING SCHEDULE</a>
						</div>
						<tbody id="upcoming_schedule_body">
							<?php getSchedule() ?>
							

					  	</tbody>						
		  			</table>
		  		</div>	
	  		</div>
		</div>
	</body>
</html>

<?php require_once 'footer.php';


