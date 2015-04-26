<html lang="en">
	<head>
		<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700|Oswald:400,700|Open+Sans' rel='stylesheet' type='text/css'>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Spokane Club recreational basketball league realtime game stats logging">
		<meta name="author" content="Leland Burlingame">

		<title>Spokane Club</title>

		<!-- Bootstrap CSS -->
		<link href="assets/css/bootstrap.css" rel="stylesheet">
		<!-- Specific CSS -->
		<link href="assets/css/livestats.css" rel="stylesheet">

	</head>

	<body id="page-top">
		<!--Navbar-->
		<nav class="navbar navbar-inverse" >
			<div class="container">

				<div class="row">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only">Toggle Navigation</span>
							<span class="icon-bar"></span> 
							<span class="icon-bar"></span> 
							<span class="icon-bar"></span> 
						</button>
						<a class="navbar-brand" href="#">
							<img alt="Brand" style="margin-top:-25px" data-toggle="modal" data-target="#exit_modal" src="assets/img/SCxsmall.png">
							Dreamstreet vs Tibbits 2/21/2015
						</a>
					</div>

					<div class="navbar-collapse collapse">
						<ul class="nav navbar-nav navbar-right">
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exit_modal" aria-pressed="false" autocomplete="off">
							  Save Game							
							  <span class="glyphicon glyphicon-save"></span>
							</button>
							<button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off">
							  Export
  							  <span class="glyphicon glyphicon-export"></span>
							</button>
						</ul>
					</div>
				</div>
			</div>
		</nav>

		<!-- container for grid of buttons used to keep track of the current game stats
		dynamically added based on the teams playing in the game-->
		<div class="container" id="game_controls">
			<div class="row" id="controls_row">

				<div class="col-sm-3 col-md-3 col-lg-3" id="team1col">			  		
					<div class="row top-buffer" id="team1b0"></div>
		  		</div>

				<div class="col-sm-1 col-md-1 col-lg-1" id="control_left"></div>
				<div class="col-sm-4 col-md-4 col-lg-4 text-center" id="control_center">
					<div class="row" id="controlrow0"> </div>
					<div class="row controls" id="controlrow1">					
						<div class="btn-group" role="group" aria-label="...">
						  <button type="button" class="btn btn-default">+1</button>
						  <button type="button" class="btn btn-default">+2</button>
						  <button type="button" class="btn btn-default">+3</button>
						</div>
					</div>

					<div class="row controls" id="controlrow2">					
						<div class="btn-group" role="group" aria-label="...">
						  <button type="button" class="btn btn-default">assist</button>
						  <button type="button" class="btn btn-default">rebound</button>
						  <button type="button" class="btn btn-default">steal</button>
						</div>
					</div>
					<div class="row undo" id="controlrow3">					
						  <button type="button" class="btn btn-default">undo							 
						   	<span class="glyphicon glyphicon-arrow-left"></span>
						  </button>
					</div>
				</div>
				<div class="col-sm-1 col-md-1 col-lg-1" id="control_right"></div>

				<div class="col-sm-3 col-md-3 col-lg-3" id="team2col">		  		
					<div class="row top-buffer" id="team2b0"></div>
		  		</div>

	  		</div>
		</div>

	    <div class="container">
	        <div class="row text-center">
	            <h3>Current Scores</h3>
	          <!--  <a href="#" class="btn btn-lg btn-success" data-toggle="modal" data-target="#basicModal">Click to open Modal</a> -->
	        </div>
	    </div>

	    <!-- container for current player stats table
	    trying to figure out how to split it into 2 tables with the same column proportions, one for each team
	    and how to show team totals(maybe bolded?)-->
		<div class="container">
			<table class="table table-hover" id="game_stats">
				<thead>
					<tr >
						<th>
							Name
						</th>
						<th>
							Points
						</th>
						<th>
							Rebounds
						</th>
						<th>
							Assists
						</th>
						<th>
							Steals
						</th>
					</tr>
				</thead>
				<tbody id="stats_body">
			  	</tbody>						
  			</table>	
		</div>

		<!-- Save Changes? Modal Popup when trying to leave the form after making changes and not having saved -->
	    <div class="modal" id="exit_modal" tabindex="-1" role="dialog" aria-labelledby="exit_modal" aria-hidden="true">
	      <div class="modal-dialog">
	        <div class="modal-content">
	          <div class="modal-header">
	            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	            <h4 class="modal-title" id="modalLabel">Save Changes?</h4>
	          </div>
	          <div class="modal-body">
	            <h3>Would you like to save your changes?</h3>
	          </div>
	          <div class="modal-footer">
	            <button type="button" class="btn btn-default" onclick="leavePage()" data-dismiss="modal">Discard Changes</button>
	            <button type="button" class="btn btn-primary" onclick="leavePage()" >Save</button>
	          </div>
	        </div>
	      </div>
	    </div>



	    <!--load javascript-->
	    <script src="https://code.jquery.com/jquery.js"></script>
	    <script src="assets/js/bootstrap.min.js"></script>
		<!-- testing javascript stuff here #TEMPORARY-->
		<script src="assets/js/livestats.js"> </script>
		<!--##################END OF JAVASCRIPT##################-->
		<!--                           	  
                 -->
	</body>
</html>



<!-- 	

$('#buttonsr'+i).html('<div class="col-sm-3 col-md-3 col-lg-3> <button type="button" class="btn btn-lg btn-block" data-toggle="button" aria-pressed="false" autocomplete="off">' + team1[i][0] + '</button> </div>');


 + (i+1) +"</td><td><input name='name"+i+"' type='text' placeholder='Name' class='form-control input-md'  /> </td><td><input  name='mail"+i+"' type='text' placeholder='Mail'  class='form-control input-md'></td><td><input  name='mobile"+i+"' type='text' placeholder='Mobile'  class='form-control input-md'></td>");
<div class="col-sm-3 col-md-3 col-lg-3">

				<button type="button" class="btn btn-lg btn-block" data-toggle="button" aria-pressed="false" autocomplete="off">
					Leland Burlingame
				</button>
			</div>
			<div class="col-sm-3 col-md-3 col-lg-3"></div>
			<div class="col-sm-3 col-md-3 col-lg-3"></div>
			<div class="col-sm-3 col-md-3 col-lg-3">
				<button type="button" class="btn btn-lg btn-block" data-toggle="button" aria-pressed="false" autocomplete="off">
					Nathan Tonani
				</button>
			</div>

			-->
