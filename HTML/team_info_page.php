<!-- Team info page compiles team related information - including - roster, season stats, schedule -->
<?php
		require_once 'header.php';
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

		<!-- team info js -->
		<script src="assets/js/teamshow.js"></script>


	</head>
    <body>
			<!-- Team info navbar - hide/show team info -->
      <nav class="navbar navbar-inverse bodynav">
        <div class="container-fluid">
          <div class="row">
            <div class="navbar-header">
              <a class="navbar-brand brandtitle" href="#">Team Info</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
              <li class="space active" id="hide_"><a onClick="showTeam('hide_')">Hide All</a></li>
              <li class="space" id="show_"><a onClick="showTeam('show_')">Show All</a></li>
            </ul>
          </div>
        </div>
      </nav>

		<!-- all HTML is dynamically generated because the number of teams is not known -->
    <?php require_once 'assets/php/team_info_queries.php';
			if(isset($_GET['tid'])){
				$team = $_GET['tid'];
				print "<script type='text/javascript' src='assets/js/teamshow.js'> showTeam('".$team."'); </script>";
			}?>

		<div class="footermargin"></div>
    </body>
  </html>
  <?php require_once 'footer.php';?>
