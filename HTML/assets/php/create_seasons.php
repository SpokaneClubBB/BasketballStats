<?php

	function createSeason($sid){
		try{
			$dbm = new PDO("sqlite:assets/db/scbbmain.db");
			$dbm->exec("INSERT INTO Seasons VALUES (" .$sid. ");");
			$dbm = null;

			$db = new PDO("sqlite:assets/db/scbb" .$sid. ".db");

			$db->exec("CREATE TABLE `Player_Game_Stats` (
						`Player_ID`	INTEGER NOT NULL,
						`Game_ID`	INTEGER NOT NULL,
						`Points`	NUMERIC,
						`FGM`	INTEGER,
						`FGA`	INTEGER,
						`TPM`	INTEGER,
						`TPA`	INTEGER,
						`FTM`	INTEGER,
						`FTA`	INTEGER,
						`Assists`	INTEGER,
						`Steals`	INTEGER,
						`Rebounds`	INTEGER,
						`Blocks`	INTEGER,
						PRIMARY KEY(Player_ID,Game_ID));
			");

			$db->exec("CREATE TABLE `Player_Info` (
						`Player_ID`	INTEGER NOT NULL UNIQUE,
						`First_Name`	TEXT,
						`Last_Name`	TEXT,
						`Number`	INTEGER,
						`Position`	TEXT,
						`Team`	INTEGER,
						PRIMARY KEY(Player_ID)
					);
			");

			$db->exec("CREATE TABLE `Player_Stats` (
						`Player_ID`	INTEGER NOT NULL UNIQUE,
						`First_Name`	TEXT,
						`Last_Name`	TEXT,
						`Games_Played`	REAL,
						`Points`	REAL,
						`FGM`	REAL,
						`FGA`	REAL,
						`TPM`	REAL,
						`TPA`	REAL,
						`FTM`	REAL,
						`FTA`	REAL,
						`Assists`	REAL,
						`Steals`	REAL,
						`Rebounds`	REAL,
						`Blocks`	REAL,
						PRIMARY KEY(Player_ID)
					);							
			");

			$db->exec("CREATE TABLE `Schedule` (
						`Game_ID`	INTEGER,
						`Home`	INTEGER,
						`Away`	INTEGER,
						`Date`	NUMERIC,
						`Time`	INTEGER,
						PRIMARY KEY(Game_ID)
					);
			");

			$db->exec("CREATE TABLE `Team_Game_Stats` (
						`Game_ID`	INTEGER,
						`Team`	INTEGER,
						`Date`	NUMERIC,
						`Home/Away`	REAL,
						`Opponent`	INTEGER,
						`PointsFor`	INTEGER,
						`PointsAgst`	INTEGER,
						`FGM`	INTEGER,
						`FGA`	INTEGER,
						`3PM`	INTEGER,
						`3PA`	INTEGER,
						`FTM`	INTEGER,
						`FTA`	INTEGER,
						`Assists`	INTEGER,
						`Steals`	INTEGER,
						`Rebounds`	INTEGER,
						`Blocks`	INTEGER
					);
			");

			$db->exec("CREATE TABLE `Team_Stats` (
						`Team`	INTEGER,
						`Games_Played`	INTEGER,
						`Wins`	INTEGER,
						`Points`	REAL,
						`Losses`	INTEGER,
						`FGM`	REAL,
						`FGA`	REAL,
						`TPM`	REAL,
						`TPA`	REAL,
						`FTM`	REAL,
						`FTA`	REAL,
						`Assists`	REAL,
						`Steals`	REAL,
						`Rebounds`	REAL,
						`Blocks`	REAL,
						PRIMARY KEY(Team)
					);
			");


			$db = null;
			

		}catch(PDOException $e){
			print 'Exception : '.$e->getMessage();
		}
	}

	




?>
<!--




-->