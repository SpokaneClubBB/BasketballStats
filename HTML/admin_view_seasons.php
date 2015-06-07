<?php   

	if(isset($_COOKIE["loggedin"]) && $_COOKIE["loggedin"]== 0) {
			//If you're logged in then redirect you to the landing page.
			header( 'Location: index.php' );
	}		
    require_once 'header.php';
    require_once 'assets/php/admin_queries.php';
    //require_once 'assets/php/create_seasons.php';
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
		<link href="assets/css/admin.css" rel="stylesheet">

	</head>
	
	<body id="body">

		<nav class="navbar navbar-inverse bodynav">
			<div class="container-fluid" id="content">
				<div class="row">
					<div class="navbar-header">
						<a class="navbar-brand brandtitle">Seasons</a>
					</div>
					<ul class="nav navbar-nav navbar-right">
					
					</ul>
				</div>
			</div>
		</nav>

		<div class="container">
		    <div class="row">
		     	<?php require_once 'admin_nav.php'; ?>
		        <div class="col-md-10">
		            <div class="container-fluid" id ="games_container" style="display:hide">
						<table class="table table-condensed table-hover" id="seasons">
							<thead>
								<tr class = "table_headers">
									<th><span class="season">Season</span></th>
									<th><span class="start">Start</span></th>
									<th><span class="end">End</span></th>
									<th><span class="rmv">&nbsp</span></th>
								</tr>
							</thead>
							<tbody id="seasons_body">
								<?php getSeasonsAdmin() ?>
						  	</tbody>	
			  			</table>
					</div>
					
		        </div>
		    </div>
	    </div>


	     <div class="modal" id="confirmation_modal" tabindex="-1" role="dialog" aria-hidden="true">
	      <div class="modal-dialog">
	        <div class="modal-content">
	          <div class="modal-header">
	            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	            <h4 class="modal-title" id="modalLabel">Remove Season?</h4>
	          </div>
	          <div class="modal-body">
	          </div>
	          <div class="modal-footer">
	            <button type="button" class="btn btn-default" onclick="#" data-dismiss="modal">Cancel</button>
 				<button type="submit" class="btn btn-default">Delete</button>
			  </div>
	        </div>
	      </div>
	    </div>
			
		
		<!--js-->
		<script src="https://code.jquery.com/jquery.js"></script>
	    <script src="assets/js/bootstrap.min.js"></script>
    	<script src="assets/js/seasons_admin.js"></script>
    	<script> 
			$('.glyphicon-remove').on('click',function(e){
				$(this).parent().parent().remove();
				var editid = $(this).parent().parent().attr("id");
				alert(editid);
				 
				$('#confirmation_modal').modal('show');
			});
/*
			$( document ).on( 'click', '.glyphicon-remove', function () {
			 	$(this).parent().parent().remove();
				var editid = $(this).parent().parent().attr("id");
				alert(editid);

			 	$('#confirmation_modal').modal('show');
			 });*/

    	</script>
	</body>
</html>
