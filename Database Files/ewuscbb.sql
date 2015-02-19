BEGIN TRANSACTION;
CREATE TABLE `Team Stats` (
	`Team Name`	TEXT,
	`Points`	INTEGER,
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
CREATE TABLE `Team Game Stats` (
	`Team Name`	TEXT,
	`Date`	NUMERIC,
	`Home/Away`	TEXT,
	`Opponent`	TEXT,
	`Points`	INTEGER,
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
CREATE TABLE `Schedule` (
	`Team Name`	TEXT,
	`Date`	NUMERIC,
	`Home/Away`	TEXT
);
CREATE TABLE `Player Stats` (
	`First Name`	TEXT,
	`Last Name`	TEXT,
	`Games Played`	INTEGER,
	`Points`	INTEGER,
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
CREATE TABLE `Player Info` (
	`First Name`	TEXT,
	`Last Name`	TEXT,
	`Number`	INTEGER,
	`Position`	TEXT,
	`Team`	TEXT
);
CREATE TABLE `Player Game Stats` (
	`First Name`	TEXT,
	`Last Name`	TEXT,
	`Date`	NUMERIC,
	`Opponent`	TEXT,
	`Points`	INTEGER,
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
COMMIT;
