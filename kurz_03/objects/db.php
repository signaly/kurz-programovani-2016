<?php

$connection = new \Nextras\Dbal\Connection([
	...
]);

$result = $connection->query('select * from users');
$rows = $result->fetchAll();
$row1 = $result->fetch(); // 1
$row2 = $result->fetch(); // 2
$row1->toArray();

$result = $connection->query(';');

$row = $result->fetch();

function editUserCredentials(): \Nextras\Dbal\Result\Row
{

}

$row->asdasdasd;
$row['asdasd'];


$dbConnection = new \Nextras\Dbal\Connection(;)








class DatabaseHelpers
{
	public function __construct()
	{
	}


	function foo()
	{
		$name = "'; OR DELETE * FROM users; SELECT '";
		$this->dbConnection->query("SELECT * FROM users where name = %s WHERE id %i", $name, $id);
	}
}
























