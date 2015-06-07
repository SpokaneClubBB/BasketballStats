$(window).scroll(function(){
    $("#control_panel").css("top",Math.max(50,250-$(this).scrollTop()));
});

function toTeam(index) {
	var options = document.getElementById('players_bank').options;

	for (var i=0; i<options.length; i++) {
		opt = options[i];

		if (opt.selected) {
		     $('#team_' + index)
			 .append($("<option></option>")
			 .attr("value",opt.value)
			 .text(opt.text)); 
		}
	}
	$('#players_bank option:selected').remove()	

	var table = document.getElementById("teams");

	var table_len = table.rows.length;

	var row = table.rows[table_len-1];
	var curr_len = row.cells.length;
	curr_len = curr_len - 1 + (table_len-1) * 3; 

	for (var i = 1; i <= curr_len; i++) {
		if (i != index) {
			var options = document.getElementById('team_' + i).options;

			if (options != null) {
				for (var j = 0; j < options.length; j++) {
					opt = options[j];

					if (opt.selected) {
					     $('#team_' + index)
						 .append($("<option></option>")
						 .attr("value",opt.value)
						 .text(opt.text)); 
					}
				}
			}
			$('#team_' + i + ' option:selected').remove()	
		}
	
	}
}

function removeSelected() {
	var table = document.getElementById("teams");

	var table_len = table.rows.length;

	var row = table.rows[table_len-1];
	var curr_len = row.cells.length;
	curr_len = curr_len - 1 + (table_len-1) * 3; 

	for (var i = 1; i <= curr_len; i++) {
		var options = document.getElementById('team_' + i).options;

		if (options != null) {
			for (var j = 0; j < options.length; j++) {
				opt = options[j];

				if (opt.selected) {
				     $('#players_bank')
					 .append($("<option></option>")
					 .attr("value",opt.value)
					 .text(opt.text)); 
				}
			}
		}
		$('#team_' + i + ' option:selected').remove()	
	}
}


function storeValues(sid){
	try{
		var teamData = new Array();

		teamData = JSON.stringify(storeTeamData());
		$.ajax({
			type:"POST",
			url: "assets/php/process_team_creation.php",
			data: "teamData=" + teamData + "&seasonID=" + sid, //seasonID,
			success: function(msg){
				if(msg=="Success!"){
					alert(msg);
					window.location.href = "admin_home.php";
				}else{
					alert(msg);
				}
				
			}
		});
	}catch(err){
		alert("In storeValues: " + err.message);
	}
}


function storeTeamData(){
	try{
		var teamData = new Array();

		var table = document.getElementById("teams");

		var table_len = table.rows.length;

		var row = table.rows[table_len-1];
		var curr_len = row.cells.length;
		curr_len = curr_len - 1 + (table_len-1) * 3; 

		for (var i = 1; i <= curr_len; i++) {
			var options = document.getElementById('team_' + i).options;
			var listData = new Array();

			if (options != null) {
				for (var j = 0; j < options.length; j++) {
					opt = options[j];
					var name = opt.text.split(", ");

					 listData[j] = {
						"Player_ID" : opt.value,
						"First_Name" : name[1],
						"Last_Name" : name[0]
					}
				}
			}
			teamData[i-1] = listData;
		}
	
		return teamData;
	}catch(err){
		alert("In storeTblValues: " +err.message);
	}
}


function filter(element) {
    var value = $(element).val().toUpperCase();
    $("#players_bank > option").each(function() {
		var name = $(this).text().split(", ");

        if (name[0].toUpperCase().search(value) > -1 || name[1].toUpperCase().search(value) > -1) {
            $(this).show();
        } else {
            $(this).hide();
        }
    });
}

/*$(window).scroll(function(){
    $('#players_all').css({'left': -$(this).scrollLeft() + 150});
});*/


