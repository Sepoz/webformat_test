<?php

class PM
{
	public $id;
	public $name;
	public $role;
	public $team_id;

	public function __construct($PM)
	{
		$this->id = $PM->id;
		$this->name = $PM->name;
		$this->role = $PM->role;
		$this->team_id = $PM->team_id;
	}

	/* 
		print the PM data	
	*/
	public function print()
	{
		echo "--------------------------------------"  . "\n";
		echo "ID: " . $this->id . "\n";
		echo "Name: " . $this->name . "\n";
		echo "Role: " . $this->role . "\n";
		echo "Team_ID: " . $this->team_id . "\n";
		echo "--------------------------------------"  . "\n";
	}
}
