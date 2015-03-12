function leaderUpdate(input) {
	if(input == 'season_'){
		$('#totals_').addClass("active");
		$('#pergame_').removeClass("active");
		$('#ps_season').show();
		$('#ps_pergame').hide();

	}
	else if(input == 'per_'){
		$('#pergame_').addClass("active");
		$('#totals_').removeClass("active");
		$('#ps_pergame').show();
		$('#ps_season').hide();

	}
		
	else
		alert("an error occured");
}