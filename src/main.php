<?php

require "rb-mysql.php";

// Task
include("./classes/Task.php");

// PM
include("./classes/PM.php");

// Dev
include("./classes/Dev.php");

// Project
include("./classes/Project.php");


R::setup('mysql:host=localhost;dbname=webformat_test', 'root', 'rootroot');

// t -> task operations
$shortOpt = "t::";
// a -> assign  r -> remove
$shortOpt .= "a::r::";
// l -> list
$shortOpt .= "l::";


// project operations 
$shortOpt .= "p::";
// s -> shared
$shortOpt .= "s::";


// d -> dev operations
$shortOpt .= "d::";
// m -> manager
$shortOpt .= "m::";

$longOpt = array(
	"dev::",
	"desc::",
	"status::",
	"dline::",
	"tID::"
);

$opt = getopt($shortOpt, $longOpt);

/* 
	check the options and execute the corresponding operation
*/
if (isset($opt["t"])) {

	if (isset($opt["a"])) {

		$task = Task::createTaskDb($opt["desc"], $opt["status"], $opt["dline"]);
		Dev::assignTask($opt["dev"], $task);
	} else if (isset($opt["r"])) {

		Dev::removeTask($opt["dev"], $opt["tID"]);
		echo "Task rimossa \n";
	} else if (isset($opt["l"])) {

		$incompleteTasks = Dev::getIncompleteTask($opt["dev"]);

		if (count($incompleteTasks) > 0) {
			foreach ($incompleteTasks as $t) {
				$task = new Task($t->id, $t->description, $t->status, $t->deadline);
				$task->print();
			}
		} else {
			echo "Nussuna task in elaborazione \n";
		}
	}
} else if (isset($opt["d"])) {

	if (isset($opt["m"])) {
		$PM = Dev::getOwnPM($opt["dev"]);
		$objectPM = new PM($PM);
		$objectPM->print();
	}
} else if (isset($opt["p"])) {

	if (isset($opt["s"])) {
		$sharedProjects = Project::getShared();

		foreach ($sharedProjects as $sp) {
			$project = new Project($sp->id, $sp->name);
			$project->print();
		}
	}
}
