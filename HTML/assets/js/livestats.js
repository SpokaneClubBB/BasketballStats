
var table = document.getElementById("stats_body")

var team1 = new Array()
team1[0] = new Array("Nathan Tonani", 0, 0, 0, 0)
team1[1] = new Array("Tony Moua", 0, 0, 0, 0)
team1[2] = new Array("Josh Schultz", 0, 0, 0, 0)
team1[3] = new Array("Leland Burlingame", 0, 0, 0, 0)
team1[4] = new Array("Kyle Wyler", 0, 0, 0, 0)

var team2 = new Array()
team2[0] = new Array("Robert Lippman", 0, 0, 0, 0)
team2[1] = new Array("Jared Tikker", 0, 0, 0, 0)
team2[2] = new Array("Houston Stockton", 0, 0, 0, 0)
team2[3] = new Array("Spencer Bishop", 0, 0, 0, 0)
team2[4] = new Array("Jordan Tampien", 0, 0, 0, 0)

 $(document).ready(function(){
	for (var i = 0; i < team1.length; i++) {
	    var tr = document.createElement('TR');
		for (var j = 0; j < team1[i].length; j++) { 
			var td = document.createElement('TD')
			td.appendChild(document.createTextNode(team1[i][j]));
			tr.appendChild(td)
		}
		table.appendChild(tr)

    	var button = '<button type="button" class="btn btn-lg btn-block" onclick="targetPlayer(' + i + ')" data-toggle="button" aria-pressed="false" autocomplete="off" >' + team1[i][0] + '</button>';				
		$('#team1b'+i).append(button);
      	$('#team1col').append('<div class="row top-buffer" id="team1b' + (i+1) + '"></div>');
	}	
	for (var i = 0; i < team2.length; i++) {
	    var tr = document.createElement('TR');
		for (var j = 0; j < team2[i].length; j++) { 
			var td = document.createElement('TD')
			td.appendChild(document.createTextNode(team2[i][j]));
			tr.appendChild(td)
		}
		table.appendChild(tr)

    	var button = '<button type="button" class="btn btn-lg btn-block" onclick="targetPlayer(' + (i+team1.length) + ')" data-toggle="button" aria-pressed="false" autocomplete="off">' + team2[i][0] + '</button>';				
		$('#team2b'+i).append(button);

      	$('#team2col').append('<div class="row top-buffer" id="team2b' + (i+1) + '"></div>');
	}		

});

function targetPlayer(index) {
	var player;
	if (index < team1.length) {
		player = team1[index][0];
	}else{
		player = team2[index-team1.length][0];
	}

	$('#controlrow0').html(player);
}

function leavePage() {
	document.location.href = "header.php";
}
