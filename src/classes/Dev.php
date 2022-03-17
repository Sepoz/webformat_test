<?php

class Dev
{
	/* 
		search a dev and assign a new task
		$name -- dev name
		$task -- new task	
	*/
	public static function assignTask($name, $task)
	{
		$devBean = R::findOne('dev', 'name LIKE ?', [$name]);
		$devBean->ownTaskList[] = $task;
		R::store($devBean);

		echo "Task aggiunta \n";
	}

	/* 
		remove a task from dev
		$name -- dev name
		$task -- task to remove	
	*/
	public static function removeTask($name, $taskID)
	{
		$devBean = R::findOne('dev', 'name LIKE ?', [$name]);
		$tasks = $devBean->ownTaskList;

		foreach ($tasks as $t) {
			if ($t->id === $taskID) {
				R::trash($t);
			}
		}
	}

	/* 
		return array of incomplete tasks
		$name -- dev name
	*/
	public static function getIncompleteTask($name)
	{
		$devBean = R::findOne('dev', 'name = ?', [$name]);
		$allTasks = $devBean->ownTaskList;

		$incompleteTasks = array();

		foreach ($allTasks as $task) {
			if ($task->status === "in elaborazione") {
				array_push($incompleteTasks, $task);
			}
		}

		return $incompleteTasks;
	}

	/* 
		get dev's PM
		$name -- dev name
	*/
	public static function getOwnPM($name)
	{
		$devBean = R::findOne('dev', 'name = ?', [$name]);
		if (isset($devBean)) {
			$team = $devBean->team;
			$PM = reset($team->ownPmList);
			return $PM;
		} else {
			echo "Dev non presente nel database \n";
		}
	}
}
