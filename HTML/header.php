<?php
		require "dbConnection.php";
		require "dbFunctionsEWUSCBB.php";
?>


<html lang="en">
	<head>
		<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700|Oswald:400,700|Open+Sans' rel='stylesheet' type='text/css'>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Spokane Club recreational basketball league basketball statistics">
		<meta name="author" content="Nathan Tonani">

		<title>Spokane Club</title>

		<!-- Bootstrap CSS -->
		<link href="assets/css/bootstrap.css" rel="stylesheet">
		<!-- Specific CSS -->
		<link href="assets/css/main.css" rel="stylesheet">
	</head>
	<body id="page-top">
		<!--Navbar-->
		<nav class="navbar navbar-inverse">
			<div class="container">
				<div class="row logo">
					<a class="" href="http://www.spokaneclub.org"><img class="image-responsive" style="margin-top:-7px" src="assets/img/scsmall.png"></img></a>
				</div>
				<div class="row">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only">Toggle Navigation</span>
							<span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
						<a class="navbar-brand" href="#page-top">Basketball Stats</a>
					</div>
					<div class="navbar-collapse collapse">
						<ul class="nav navbar-nav navbar-right">
							<li class="space"><a href="#">Schedule and Scores</a></li>
							<li class="space"><a href="#">League Leaders</a></li>
							<li class="active space"><a href="#">Player Stats</a></li>
							<li class="space"><a href="#">Team Stats</a></li>
						</ul>
					</div>
				</div>
		</nav>

		<div class="scoreboard">
			<div class="container">
				<div class="row" style="border:1px solid;border-color:#2f2f2f">
					<div class="" style="text-align:center;font-size:60px">Scoreboard</div>
				</div>
			</div>
		</div>
		<br>
<center>
		<table name= "stats" border = "2">
	
		<th>FIRST NAME</th>
		<th>LAST NAME</th>
		<th>GAMES PLAYED</th>
		<th>POINTS</th>
		<th>FGM</th>
		<th>FGA</th>
		<th>3PM</th>
		<th>3PA</th>
		<th>FTM</th>
		<th>FTA</th>
		<th>ASSIST</th>
		<th>STEALS</th>
		<th>REBOUNDS</th>
		<th>BLOCKS</th>
		
	<?php 
	
		$result = getAllStats($link);
	?>	

	<?php foreach ($result as $key => $row): ?>

			
			<tr>
			<td><?php echo $row['First Name']; ?></td>
			<td><?php echo $row['Last Name']; ?></td>
			<td><?php echo $row['Games Played']; ?></td>
			<td><?php echo $row['Points']; ?></td>
			<td><?php echo $row['FGM']; ?></td>
			<td><?php echo $row['FGA']; ?></td>
			<td><?php echo $row['3PM']; ?></td>
			<td><?php echo $row['3PA']; ?></td>
			<td><?php echo $row['FTM']; ?></td>
			<td><?php echo $row['FTA']; ?></td>
			<td><?php echo $row['Assists']; ?></td>
			<td><?php echo $row['Steals']; ?></td>
			<td><?php echo $row['Rebounds']; ?></td>
			<td><?php echo $row['Blocks']; ?></td>

			</tr>
		
		
	<?php endforeach ?>
 
	</table>

</center>


