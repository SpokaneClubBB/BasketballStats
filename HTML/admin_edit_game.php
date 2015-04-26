<?php   

	if(isset($_COOKIE["loggedin"]) && $_COOKIE["loggedin"]== 0) {
			//If you're logged in then redirect you to the landing page.
			header( 'Location: index.php' );
	}		
    require_once 'header.php';
    require_once 'assets/php/admin_queries.php';

	if((int)$_GET["id"]==0){
		print "<div class = 'container'>
				<div class = 'text-center'>
					<h1>Not a valid game</h1>
				</div>
			   </div>";
		
	}
	
	require_once 'assets/php/get_game_stats.php';
?>

<html lang="en">
	<head>
		<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700|Oswald:400,700|Open+Sans' rel='stylesheet' type='text/css'>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Spokane Club Basketball Stats Administrator Management Page">
		<meta name="author" content="Leland Burlingame">

		<title>Spokane Club</title>

		<!-- page spec css -->
		<link href="assets/css/individualstats.css" rel="stylesheet">
		<!-- page spec javascript -->

	</head>
	
	<body id="body">
		<h2>Game <?php print $_GET["id"]; ?></h2>

		<div class="container-fluid" id ="home_container" style="display:show">
			<table class="table table-condensed table-hover" id="home_table">
				<thead>
					<tr class = "table_headers">
						<th>Player</th>
						<th>Points</th>
						<th>FGM</th>
						<th>FGA</th>
						<th>TPM</th>
						<th>TPA</th>
						<th>FTM</th>
						<th>FTA</th>
						<th>Assists</th>
						<th>Steals</th>
						<th>Rebounds</th>
						<th>Blocks</th>
					</tr>
				</thead>
				<tbody id="home_body">
			  	</tbody>						
  			</table>
		</div>

		<div class="container-fluid" id ="away_container" style="display:show">
			<table class="table table-condensed table-hover" id="away_table">
				<thead>
					<tr class = "table_headers">
						<th>Player</th>
						<th>Points</th>
						<th>FGM</th>
						<th>FGA</th>
						<th>TPM</th>
						<th>TPA</th>
						<th>FTM</th>
						<th>FTA</th>
						<th>Assists</th>
						<th>Steals</th>
						<th>Rebounds</th>
						<th>Blocks</th>
					</tr>
				</thead>
				<tbody id="away_body">
			  	</tbody>						
  			</table>
		</div>

		<ul></ul>

		
		<!-- javascript -->
	    <script src="https://code.jquery.com/jquery.js"></script>
	    <script src="assets/js/bootstrap.min.js"></script>
		<script src="admin_edit_game.js"></script>

	</body>
</html>

