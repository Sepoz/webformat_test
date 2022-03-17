<?php

class Task
{
	public $id;
	public $description;
	public $status;
	public $deadline;

	public function __construct($id, $description, $status, $deadline)
	{
		$this->id = $id;
		$this->description = $description;
		$this->status = $status;
		$this->deadline = $deadline;
	}

	/* 
		create a new task in the database
	*/
	public static function createTaskDb($description, $status, $deadline)
	{
		$task = R::dispense('task');
		$task->description = $description;
		$task->status = $status;
		$task->deadline = $deadline;
		R::store($task);

		return $task;
	}

	/* 
		print the task data
	*/
	public function print()
	{
		echo "--------------------------------------"  . "\n";
		echo "ID: " . $this->id . "\n";
		echo "Descrizione: " . $this->description . "\n";
		echo "Status: " . $this->status . "\n";
		echo "Deadline: " . $this->deadline . "\n";
		echo "--------------------------------------"  . "\n";
	}
}
