<?php


// Seeder class test


/* 
require "rb-mysql.php";
R::setup('mysql:host=localhost;dbname=webformat_test', 'root', 'rootroot');

interface SeederInterface
{
}

class CEO implements SeederInterface
{
	public $name;
	public $role = "CEO";

	public function __construct($name)
	{
		$this->name = $name;
	}
}


class Seeder
{
	public function create(SeederInterface $dbEntry, $table)
	{
		$entry = R::dispense($table);
		foreach ($dbEntry as $key => $value) {
			$entry->$key = $value;
		}
		R::store($entry);
	}

	public function oneToMany()
	{

	}
}

$seeder = new Seeder();
$ceo = new CEO("beppe");

$seeder->create($ceo, "ceo"); */
