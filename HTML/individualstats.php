<?php require_once 'header.php';?>

<html lang="en">
	<head>
		<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700|Oswald:400,700|Open+Sans' rel='stylesheet' type='text/css'>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Spokane Club recreational basketball league individual player statistics">
		<meta name="author" content="Leland Burlingame">

		<title>Spokane Club</title>

		<!-- Bootstrap CSS -->
		<link href="assets/css/bootstrap.css" rel="stylesheet">
		<!-- Specific CSS -->
		<link href="assets/css/main.css" rel="stylesheet">
		<link href="assets/css/individualstats.css" rel="stylesheet">

	</head>
	<body id="player_body">

		<div class="container-fluid" id="averagestats">
			<div class="row">
			<!-- this is not good, but I couldn't find out how to get just 2 columns centered, so I put 4 columns total so the spacing looks good-->
			     <div class="col-sm-0 col-md-2 col-lg-3"></div>
			     <div class="col-sm-6 col-md-4 col-lg-3" id="playerinfo">
     				<div class="row">Nathan Tonani</div>
     				<div class="row top-buffer">23, what is this?</div>
     				<div class="row">Tibbits</div>
			     </div>
			     <div class="col-sm-6 col-md-4 col-lg-3" id="avgplayerstats">
     				<div class="row">PTS 10.5</div>
     				<div class="row">REB 2.1</div>
     				<div class="row">AST 6.3</div>
     				<div class="row">STL 23.1</div>
			     </div>
  			     <div class="col-sm-0 col-md-2 col-lg-3"></div>
		    </div>
		</div>

		<!--Navbar Player Stats-->
		<nav class="navbar navbar-inverse bodynav">
			<div class="container">
				<div class="row">
					<div class="navbar-header">
						<a class="navbar-brand brandtitle">PLAYER STATS</a>
					</div>
					<ul class="nav navbar-nav navbar-right">
						<li class="space"><a href="#">TOTALS</a></li>
						<li class="active space"><a href="#">PER GAME</a></li>
					</ul>
				</div>
			</div>
		</nav>

		<!-- Stats for Player per Season + a row for Career Totals-->
		<div class="container">
			<table class="table table-hover" id="game_stats">
				<thead>
					<tr >
						<th>Season</th>
						<th>Points</th>
						<th>Rebounds</th>
						<th>Assists</th>
						<th>Steals</th>
					</tr>
				</thead>
				<tbody id="pstats_body">
					<tr> 
						<td>1</td>
						<td>222</td>
						<td>2821</td>
						<td>296</td>
						<td>152</td>
					</tr>
					<tr> 
						<td>2</td>
						<td>220</td>
						<td>3081</td>
						<td>290</td>
						<td>151</td>
					</tr>
					<tr> 
						<td>Career</td>
						<td>442</td>
						<td>3081+2821</td>
						<td>586</td>
						<td>303</td>
					</tr>

			  	</tbody>						
  			</table>	
		</div>

		<!--Navbar Past Games-->
		<nav class="navbar navbar-inverse bodynav">
			<div class="container">
				<div class="row">
					<div class="navbar-header">
						<a class="navbar-brand brandtitle">GAME LOGS</a>
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

		<!-- Game History Table for Player -->
		<div class="container">
			<table class="table table-hover" id="past_games">
				<thead>
					<tr >
						<th>Date</th>
						<th>Points</th>
						<th>Rebounds</th>
						<th>Assists</th>
						<th>Steals</th>
					</tr>
				</thead>
				<tbody id="log_body">
					<tr> 
						<td>1/29/15</td>
						<td>22</td>
						<td>308</td>
						<td>29</td>
						<td>15</td>
					</tr>
					<tr> 
						<td>2/2/15</td>
						<td>0</td>
						<td>10</td>
						<td>11</td>
						<td>19</td>
					</tr>
			  	</tbody>						
  			</table>	
		</div>


	</body>

</html>

<?php require_once('footer.php');?>
