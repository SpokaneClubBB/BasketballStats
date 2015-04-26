<?php   

	if(isset($_COOKIE["loggedin"]) && $_COOKIE["loggedin"]== 0) {
			//If you're logged in then redirect you to the landing page.
			header( 'Location: index.php' );
	}		
    require_once 'header.php';
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
	<body>

	<nav class="navbar navbar-inverse bodynav">
		<div class="container-fluid" id="content">
			<div class="row">
				<div class="navbar-header">
					<?php if(isset($_COOKIE["loggedin"]) && $_COOKIE["loggedin"]==1) {
						print "Welcome, " .$_COOKIE["username"]; 
					}
					?>
				<!--	<a class="navbar-brand brandtitle">Admin Home</a>-->
				</div>
				<ul class="nav navbar-nav navbar-right">
				
				</ul>
			</div>
		</div>
	</nav>

	<?php require_once 'admin_nav.php' ?>

	</body>


</html>


