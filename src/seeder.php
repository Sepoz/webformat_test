<?php

require "rb-mysql.php";
R::setup('mysql:host=localhost;dbname=webformat_test', 'root', 'rootroot');


// SEEDING


// company
$company = R::dispense('company');
$company->name = "webformat";


// CEO
$CEO = R::dispense('ceo');
$CEO->name = "Francesco";
$CEO->role = "CEO";


// PM
$PM1 = R::dispense('pm');
$PM1->name = "Francesca Rossi";
$PM1->role = "PM";

$PM2 = R::dispense('pm');
$PM2->name = "Giuseppe Russo";
$PM2->role = "PM";


// devs
$dev1 = R::dispense('dev');
$dev1->name = "Mario Romano";
$dev1->role = "DEV";

$dev2 = R::dispense('dev');
$dev2->name = "Maria Lambrate";
$dev2->role = "DEV";

$dev3 = R::dispense('dev');
$dev3->name = "Luca Bonfiglio";
$dev3->role = "DEV";

$dev4 = R::dispense('dev');
$dev4->name = "Lucia Buonarroti";
$dev4->role = "DEV";


// teams
$team1 = R::dispense('team');
$team1->name = "team1";

$team1->ownPmList[] = $PM1;
$team1->ownDevList[] = $dev1;
$team1->ownDevList[] = $dev2;

$team2 = R::dispense('team');
$team2->name = "team2";

$team2->ownPmList[] = $PM2;
$team2->ownDevList[] = $dev3;
$team2->ownDevList[] = $dev4;


// projects
$project1 = R::dispense('project');
$project1->name = "Panini website";

$project2 = R::dispense('project');
$project2->name = "Webformat website";

$project1->ownDevList[] = $dev1;
$project1->ownDevList[] = $dev3;
$project2->ownDevList[] = $dev2;
$project2->ownDevList[] = $dev4;


// tasks
$task1 = R::dispense('task');
$task1->description = "task 1";
$task1->status = "in elaborazione";
$task1->deadline = "12-12-2022";

$task2 = R::dispense('task');
$task2->description = "task 2";
$task2->status = "in elaborazione";
$task2->deadline = "12-12-2022";

$task3 = R::dispense('task');
$task3->description = "task 3";
$task3->status = "completato";
$task3->deadline = "12-12-2022";

$task4 = R::dispense('task');
$task4->description = "task 4";
$task4->status = "in elaborazione";
$task4->deadline = "12-12-2022";

$dev1->ownTaskList[] = $task1;
$dev1->ownTaskList[] = $task2;
$dev2->ownTaskList[] = $task3;
$dev4->ownTaskList[] = $task4;


R::store($company);

R::store($CEO);

R::store($project1);
R::store($project2);

R::store($PM1);
R::store($PM2);

R::store($team1);
R::store($team2);

R::store($dev1);
R::store($dev2);
R::store($dev3);
R::store($dev4);
