$(document).ready(function(){
	var url = $(location).attr('pathname');
	var input;
	if(url.search('index.php')>=0){
		input = '<li class="space"><a href="schedule_scores.php">Schedule and Scores</a></li><li class="space"><a href="#">League Leaders</a></li><li class="space"><a href="player_stats.php">Player Stats</a></li><li class="space"><a href="#" data-toggle="modal" data-target="#login_modal" >Team Stats</a></li>';
	}else if(url.search('schedule_scores.php')>=0){
		input = '<li class="active space"><a href="schedule_scores.php">Schedule and Scores</a></li><li class="space"><a href="#">League Leaders</a></li><li class="space"><a href="player_stats.php">Player Stats</a></li><li class="space"><a href="#" data-toggle="modal" data-target="#login_modal" >Team Stats</a></li>';
	}else if(url.search('leaders.php')>=0){
		input = '<li class="space"><a href="schedule_scores.php">Schedule and Scores</a></li><li class="active space"><a href="#">League Leaders</a></li><li class="space"><a href="player_stats.php">Player Stats</a></li><li class="space"><a href="#" data-toggle="modal" data-target="#login_modal" >Team Stats</a></li>';
	}else if(url.search('player_stats.php')>=0){
		input = '<li class="space"><a href="schedule_scores.php">Schedule and Scores</a></li><li class="space"><a href="#">League Leaders</a></li><li class="active space"><a href="player_stats.php">Player Stats</a></li><li class="space"><a href="#" data-toggle="modal" data-target="#login_modal" >Team Stats</a></li>';
	}else if(url.search('teamstats.php')>=0){
		input = '<li class="space"><a href="schedule_scores.php">Schedule and Scores</a></li><li class="space"><a href="#">League Leaders</a></li><li class="space"><a href="player_stats.php">Player Stats</a></li><li class="active space"><a href="#" data-toggle="modal" data-target="#login_modal" >Team Stats</a></li>';
	}
	$('#main_nav').prepend(input);
});