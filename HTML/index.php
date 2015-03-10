<?php 	
		require_once 'header.php';
		require "dbConnection.php";
		require "dbFunctionsEWUSCBB.php";
?>
<!-- Testing - Hiding th and td-->
<style>

th:first-child, td:first-child {
    display: none;
}

td:nth-child(1){
   display:none;
}
</style>
<html>
	<body>

		<div class="scoreboard">
			<div class="container">
				<div class="row" style="border:1px solid;border-color:#2f2f2f">
					<div class="" style="text-align:center;font-size:60px">Scoreboard</div>
				</div>
			</div>
		</div>

		<br>
		<div class="container">

			<table class="table table-hover" id="stats">
				<thead>
					<tr >
						<th>Player ID</th>
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
					
					</tr>
				</thead>

				<?php 
					$result = getAllStats($link);
				?>	

				<tbody>
					<?php foreach ($result as $key => $row): ?>
							<tr>
								<td><?php echo $row['pid']; ?></td>
								<td><a href="#"><?php echo $row['First Name']; ?></a></td>
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
				</tbody>
			</table>
		</div>
	</body>
</html>

<?php require_once 'footer.php';


