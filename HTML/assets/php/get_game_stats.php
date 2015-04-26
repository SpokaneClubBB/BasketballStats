<?php


	$id  = (int)$_GET["id"];

	$db = new PDO("sqlite:assets/db/ewuscbb.db");
	$game = $db->query("SELECT First_Name, Last_Name, Points, FGM, FGA, TPM, TPA, FTM, FTA, Assists, Steals, Rebounds, Blocks FROM Player_Info join Schedule ON Team = Schedule.Home OR Team = Schedule.Away left outer join Player_Game_Stats on Schedule.Game_ID = Player_Game_Stats.Game_ID and Player_Game_Stats.Player_ID = Player_Info.Player_ID WHERE Schedule.Game_ID = " .$id);
	$db = NULL;

	$stats = array();
	foreach($game as $row)
	{
		 $stats[] = array("First_Name" => "help me");
	}
	echo json_encode($stats);

?>

<script>
var obj = JSON.parse('<?php echo json_encode($stats) ?>');

	for (var i = 0; i < obj.length; i++) {
		document.write(obj.length);
document.write(obj[i])	} 


</script>

<!--

	/* set out document type to text/javascript instead of text/html */
	header("Content-type: text/javascript");


/* our multidimentional php array to pass back to javascript via ajax */
$arr = array(
        array(
                "first_name" => "Darian",
                "last_name" => "Brown",
                "age" => "28",
                "email" => "darianbr@example.com"
        ),
        array(
                "first_name" => "John",
                "last_name" => "Doe",
                "age" => "47",
                "email" => "john_doe@example.com"
        )
);

/* encode the array as json. this will output [{"first_name":"Darian","last_name":"Brown","age":"28","email":"darianbr@example.com"},{"first_name":"John","last_name":"Doe","age":"47","email":"john_doe@example.com"}] */
echo json_encode($arr);
-->