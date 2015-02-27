<?php
		require "dbConnection.php";
		require "dbFunctionsEWUSCBB.php";
?>

<?php include_once 'header.php';?>

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

<?php include_once 'footer.php';?>
