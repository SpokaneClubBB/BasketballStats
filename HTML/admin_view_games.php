<?php   

	if(isset($_COOKIE["loggedin"]) && $_COOKIE["loggedin"]== 0) {
			//If you're logged in then redirect you to the landing page.
			header( 'Location: index.php' );
	}		
    require_once 'header.php';
    require_once 'assets/php/admin_queries.php';
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

	</head>

	<body id="body">

		<nav class="navbar navbar-inverse bodynav">
			<div class="container-fluid" id="content">
				<div class="row">
					<div class="navbar-header">
						<a class="navbar-brand brandtitle">Games</a>
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

		<div class="container" >
		    <div class="row">
		     	<?php require_once 'admin_nav.php'; ?>
		        <div class="col-md-10">
		            <div class="container-fluid" id ="games_container" style="display:show">
						<table class="table table-condensed table-hover" id="games_head">
							<thead>
								<tr class = "table_headers">
									<th>Game</th>
									<th>Home</th>												
									<th>Away</th>
									<th>Date</th>
									<th>Time</th>
								</tr>
							</thead>
							<tbody id="games_body">
								<?php getGameHistory() ?>
						  	</tbody>						
			  			</table>
					</div>
		        </div>
		    </div>
	    </div>
			
		
		<!--js-->
		<script src="https://code.jquery.com/jquery.js"></script>
	    <script src="assets/js/bootstrap.min.js"></script>

	</body>
</html>


	    <!--
	<div align="right">
	<input type="text" id="search" placeholder="filter"></input>
	</div> -->