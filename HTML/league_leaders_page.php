<!-- League leaders contains top ten players in eight different statistics, top 5 teams in eight different statistics -->
<?php
		require_once 'header.php';
		require_once 'assets/php/league_leaders_queries.php';
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
						<li class="space active" id="player_"><a onClick="leaderUpdate('player_')">Players</a></li>
						<li class="space" id="team_"><a onClick="leaderUpdate('team_')">Teams</a></li>
					</ul>
				</div>
			</div>
		</nav>

		<!-- Player League Leaders -->
		<div class="container-fluid" id ="player_leaders" style="display:show">
			<div class = "text-center small-font">
				<!--Points per game-->
				<div class="col-lg-3 col-md-4 col-sm-5">
					<div class="col_header">
						<a href="#">POINTS PER GAME</a>
					</div>
					<table class="table table-hover" id="points_leaders">
						<tbody id="points_leaders_body">
							<?php getPPG10() ?>
					  	</tbody>
		  			</table>
		  		</div>
		  		<!-- Rebounds per game -->
		  		<div class="col-lg-3 col-md-4 col-sm-5">
					<table class="table table-hover" id="rebounds_leaders">
						<div class="col_header">
							<a href="#">REBOUNDS PER GAME</a>
						</div>
						<tbody id="rebounds_leaders_body">
							<?php getRPG10()?>
					  	</tbody>
		  			</table>
		  		</div>

		  		<!-- Assists per game -->
		  		<div class="col-lg-3 col-md-4 col-sm-5">
					<table class="table table-hover" id="assists_leaders">
						<div class="col_header">
							<a href="#">ASSISTS PER GAME</a>
						</div>
						<tbody id="assists_leaders_body">
							<?php getAPG10() ?>
					  	</tbody>
		  			</table>
		  		</div>

				<!-- Steals per game -->
		  		<div class="col-lg-3 col-md-4 col-sm-5">
					<table class="table table-hover" id="steals_leaders">
						<div class="col_header">
							<a href="#">STEALS PER GAME</a>
						</div>
						<tbody id="steals_leaders_body">
							<?php getSPG10() ?>
					  	</tbody>
		  			</table>
		  		</div>

					<!-- Blocks per game -->
          <div class="col-lg-3 col-md-4 col-sm-5">
          <table class="table table-hover" id="steals_leaders">
            <div class="col_header">
              <a href="#">BLOCKS PER GAME</a>
            </div>
            <tbody id="steals_leaders_body">
              <?php getBPG10() ?>
              </tbody>
            </table>
          </div>

					<!-- FG% -->
          <div class="col-lg-3 col-md-4 col-sm-5">
          <table class="table table-hover" id="steals_leaders">
            <div class="col_header">
              <a href="#">FG%</a>
            </div>
            <tbody id="steals_leaders_body">
              <?php getFGP10() ?>
              </tbody>
            </table>
          </div>

					<!-- TP% -->
          <div class="col-lg-3 col-md-4 col-sm-5">
          <table class="table table-hover" id="steals_leaders">
            <div class="col_header">
              <a href="#">TP%</a>
            </div>
            <tbody id="steals_leaders_body">
              <?php getTPP10() ?>
              </tbody>
            </table>
          </div>

					<!-- FT% -->
          <div class="col-lg-3 col-md-4 col-sm-5">
          <table class="table table-hover" id="steals_leaders">
            <div class="col_header">
              <a href="#">FT%</a>
            </div>
            <tbody id="steals_leaders_body">
              <?php getFTP10() ?>
              </tbody>
            </table>
          </div>
	 		</div>
		</div>



			<!-- OLD DO NOT USE REMAINDER Team league leaders main -->
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
	</body>
</html>

<?php require_once 'footer.php';
