<?php

class Project
{
	public $id;
	public $name;

	public function __construct($id, $name)
	{
		$this->id = $id;
		$this->name = $name;
	}

	/* 
		return the projects with devs from at least two different teams
	*/
	public static function getShared()
	{
		$projects = R::findAll('project');

		$sharedProjects = array();

		foreach ($projects as $project) {
			$devs = $project->ownDevList;
			$idsArray = array();

			foreach ($devs as $dev) {
				array_push($idsArray, $dev->team_id);
			}

			$uniqueIds = array_unique($idsArray);

			if (count($uniqueIds) > 1) {
				array_push($sharedProjects, $project);
			}
		}

		return $sharedProjects;
	}

	/* 
		print the project data
	*/
	public function print()
	{
		echo "--------------------------------------"  . "\n";
		echo "ID: " . $this->id . "\n";
		echo "Name: " . $this->name . "\n";
		echo "--------------------------------------"  . "\n";
	}
}
