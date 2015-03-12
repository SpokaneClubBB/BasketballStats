<?php 	
		require_once 'header.php';
		require_once 'assets/php/schedule_scores_queries.php';
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



	</head>
	<body>

		<!--Schedule navbar title -->
		<nav class="navbar navbar-inverse bodynav">
			<div class="container-fluid">
				<div class="row">
					<div class="navbar-header">
						<a class="navbar-brand brandtitle">Schedule and Scores</a>
					</div>
				</div>
			</div>
		</nav>

		<!-- Schedule -->
		<div class="container-fluid" id ="league_info_main">
			<div class = "text-center"> 
		  		<div class="col-lg-8 col-md-8 col-sm-8 leadcol">
					<table class="table table-hover" id="schedule">
						<thead>
							<tr class = "table_headers">
								<th>Home</th>
								<th>Away</th>
								<th>Date</th>
								<th>Time</th>
							</tr>
						</thead>
						<tbody id="schedule_body">
							<?php getSchedule_ss() ?>
							

					  	</tbody>						
		  			</table>
		  		</div>	
	  		</div>
		</div>


		<!--Standings navbar title -->
		<nav class="navbar navbar-inverse bodynav">
			<div class="container-fluid">
				<div class="row">
					<div class="navbar-header">
						<a class="navbar-brand brandtitle">Standings</a>
					</div>
				</div>
			</div>
		</nav>
		<!-- Standings -->
		<div class="container-fluid">
			<div class = "text-center"> 
				<!--Current Standings-->
				<div class="col-lg-8 col-md-8 col-sm-8 leadcol">
					<table class="table table-hover" id="standings">
						<thead>
							<tr class = "table_headers">
								<th></th>
								<th>Team</th>
								<th>W</th>
								<th>L</th>
								<th>PCT</th>
							</tr>
						</thead>
						<tbody id="standings_body">
							<?php getStandings_ss() ?>
					  	</tbody>						
		  			</table>
		  		</div>	
		  	</div>
		  </div>

		<!--Boxscore modal-->
		<div class="modal" id="login_modal" tabindex="-1" role="dialog" aria-labelledby="exit_modal" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="modalLabel">Boxscore</h4>
					</div>
					<div class="modal-body">
						<h3>Some Login stuff</h3>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" onclick="#" data-dismiss="modal">Cancel</button>
						<button type="button" class="btn btn-primary" onclick="#">Login</button>
					</div>
				</div>
			</div>
		</div>

	</body>
</html>

<?php require_once 'footer.php';


