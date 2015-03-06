function leaderUpdate(input) {
	if(input == 'player_'){
		$('#player_').addClass("active");
		$('#team_').removeClass("active");
		$('#player_leaders').show();
		$('#team_leaders').hide();

	}
	else if(input == 'team_'){
		$('#team_').addClass("active");
		$('#player_').removeClass("active");
		$('#team_leaders').show();
		$('#player_leaders').hide();

	}
		
	else
		alert("an error occured");
}