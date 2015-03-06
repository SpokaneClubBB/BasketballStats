BEGIN TRANSACTION;
CREATE TABLE "Team_Stats" (
	`Team`	TEXT,
	`Games_Played`	INTEGER,
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
INSERT INTO `Team_Stats` VALUES('Team1',82,'9584.0','2658.0','5684.0','1102.0','3568.0','347.0','603.0','1165.0','103.0','2180.0','48.0');
INSERT INTO `Team_Stats` VALUES('Team2',82,'8762.0','3862.0','7102.0','100.0','800.0','206.0','589.0','2030.0','117.0','2050.0','103.0');
INSERT INTO `Team_Stats` VALUES('Team3',82,'7658.0','2189.0','3065.0','648.0','2017.0','1906.0','2014.0','1010.0','64.0','860.0','165.0');
CREATE TABLE "Team_Game_Stats" (
	`Team_Name`	TEXT,
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
CREATE TABLE "Player_Stats" (
	`First_Name`	TEXT,
	`Last_Name`	TEXT,
	`Games_Played`	REAL,
	`Points`	REAL,
	`FGM`	REAL,
	`FGA`	REAL,
	`3PM`	REAL,
	`3PA`	REAL,
	`FTM`	REAL,
	`FTA`	REAL,
	`Assists`	REAL,
	`Steals`	REAL,
	`Rebounds`	REAL,
	`Blocks`	REAL
);
INSERT INTO `Player_Stats` VALUES('Tom','Capaul','81.0','1955.0','681.0','1500.0','269.0','653.0','324.0','359.0','286.0','105.0','332.0','16.0');
INSERT INTO `Player_Stats` VALUES('Rick','Allen','50.0','504.0','70.0','406.0','103.0','907.0','55.0','84.0','1164.0','102.0','16.0','1.0');
INSERT INTO `Player_Stats` VALUES('Gheorghe','Muresan','76.0','1104.0','466.0','798.0','0.0','1.0','172.0','278.0','56.0','52.0','728.0','172.0');
INSERT INTO `Player_Stats` VALUES('Muggsy','Bogues','82.0','730.0','317.0','671.0','2.0','27.0','94.0','120.0','743.0','170.0','235.0','6.0');
INSERT INTO `Player_Stats` VALUES('Jackie','Moon','82.0','104.0','52.0','97.0','0.0','68.0','0.0','19.0','1.0','2.0','11.0','4.0');
CREATE TABLE "Player_Info" (
	`First_Name`	TEXT,
	`Last_Name`	TEXT,
	`Number`	INTEGER,
	`Position`	TEXT,
	`Team`	TEXT
);
INSERT INTO `Player_Info` VALUES('Tom','Capaul',9,'PG','Team2');
INSERT INTO `Player_Info` VALUES('Rick','Allen',6,'SG','Team3');
INSERT INTO `Player_Info` VALUES('Gheorghe','Muresan',77,'C','Team1');
INSERT INTO `Player_Info` VALUES('Muggsy','Bogues',14,'PG','Team3');
INSERT INTO `Player_Info` VALUES('Jackie','Moon',69,'SF','Team2');
CREATE TABLE "Player_Game_Stats" (
	`First_Name`	TEXT,
	`Last_Name`	TEXT,
	`Date`	NUMERIC,
	`Opponent`	TEXT,
	`Points`	NUMERIC,
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
