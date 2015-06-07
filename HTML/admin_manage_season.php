<?php   

	if(isset($_COOKIE["loggedin"]) && $_COOKIE["loggedin"]== 0) {
			//If you're logged in then redirect you to the landing page.
			header( 'Location: index.php' );
	}		
    require_once 'header.php';
    require_once 'assets/php/admin_queries.php';
    require_once 'assets/php/create_seasons.php';
    require_once 'assets/php/create_teams.php';

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 		createSeason($_GET["id"]);
	}

	$db = new PDO('sqlite:assets/db/scbbmain.db');
	$season = $db->query('select Season from Seasons where Season=' .$_GET["id"]);
	$db = null;

	$row = $season->fetch(PDO::FETCH_BOTH);

	if ($row[0] == null) {
		print "Invalid Season";
	}
?>
<html lang="en">
	<head>
  		<link href="assets/css/admin.css" rel="stylesheet">
	</head>
	<body>
		 

		<div class="container teams">
			<div class="row">
			 	<div class="col-xs-2 col-sm-2 col-md-3 col-lg-3">	
			 		<div id="control_panel">
 						<button id="back_button" class="btn btn-danger control" onclick="location.href = 'admin_view_seasons.php'"><span class='glyphicon glyphicon-trash' aria-hidden='true'></span> Discard Changes</button>
						<?php 
							print "<button id='save_changes' class='btn btn-success control' onclick='storeValues(" .$_GET["id"]. ")'><span class='glyphicon glyphicon-save' aria-hidden='true'></span> Save</button>";
						?>

						<input class="search_box" type="text" onkeyup="filter(this)" placeholder="Search"> </input>

				 		<select id="players_bank" class="player_select" size="20" multiple>			
							<?php getAllPlayers($_GET["id"]); ?>
						</select>	
					 	<button class="btn btn-default" id="remove_selected" onclick="removeSelected()">Remove from Teams</button>

				 	</div>
			 	</div>
  				<div class="col-xs-10 col-sm-10 col-md-9 col-lg-9">
  					<table class="teams_table" id="teams">
						<?php $num_teams = getTeams($_GET["id"]) ?>
					</table>
  				</div>
			</div>
		</div>

		<div class="scroll">&nbsp </div>
	 	<script src="https://code.jquery.com/jquery.js"></script>
	    <script src="assets/js/bootstrap.min.js"></script>
	    <script src="assets/js/create_teams.js"></script>
	    <script>
			var num_teams = <?php echo json_encode($num_teams); ?>;

			$(document).ready(function(){

			    $("#control_panel").css("top",Math.max(50,250-$(this).scrollTop()));

				var table = document.getElementById("teams");
				var table_len = table.rows.length;
				var row = table.rows[table_len-1];
				var curr_len = row.cells.length;

				if (curr_len > 1 ) {
				    $(".scroll").css("margin-top",Math.max(16, 301 - (table_len-1)*300));
				}else if (curr_len === 1 && table_len > 1) {
				    $(".scroll").css("margin-top",35);
				}
			});


			function addTeam() {
			  	num_teams++;
			    //sTable.append('<tr><td><a href = admin_manage_season.php?id=' + sid + '>' + sid + '</a></td><td></td><td></td></tr>');
				//var row = document.getElementById("myRow");
				var table = document.getElementById("teams");

				var table_len = table.rows.length;

				var row = table.rows[table_len-1];
				var curr_len = row.cells.length;

				if (curr_len < 3) {
					var insert = row.insertCell(curr_len-1);
					insert.innerHTML = "<td><div class='players_container'><button class='btn btn-default to_team' onclick='toTeam(" + num_teams + ")'> Add to Team " + num_teams + "</button> <select id='team_" + num_teams +  "' class='player_select' size='10' multiple> </select></div></td>";
				
				    $(".scroll").css("margin-top",Math.max(16, 301 - (table_len-1)*300));
				}else if (curr_len === 3) {
					row.cells[2].innerHTML = "<td><div class='players_container'><button class='btn btn-default to_team' onclick='toTeam(" + num_teams +")'> Add to Team " + num_teams + "</button> <select id='team_" + num_teams +  "' class='player_select' size='10' multiple> </select></div></td>"

					var new_row = table.insertRow(table_len);

					var insert = new_row.insertCell(0);
					insert.innerHTML = "<div class='players_container'><button id='add_team' onclick='addTeam()'>+</button></div>";
				    $(".scroll").css("margin-top",35);
    				document.getElementById("add_team").focus();
				}	
			}
	    </script>
	</body>
</html>


<!--




		<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
  					<div class="container">
						<?//php $num_teams = getTeams($_GET["id"]) ?>
					</div>
  				</div>

  			-->


