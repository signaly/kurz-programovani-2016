<?php

const DATA_FILE = __DIR__ . '/data.dat';
const MIN_USERNAME_LENGTH = 3;
const MIN_PASSWORD_LENGTH = 5;

require_once __DIR__ . '/vendor/autoload.php';

Tracy\Debugger::enable();

$dbConnection = new Nextras\Dbal\Connection([
	'driver'   => 'mysqli',
	'host'     => 'localhost',
	'username' => 'root',
	'password' => '',
	'database' => 'test',
]);
$dbConnection->connect();
