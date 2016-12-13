<?php

require_once __DIR__ .'/config.php';

function getUserCredentials(Nextras\Dbal\Connection $dbConnection): array
{
	$data = $dbConnection->query('SELECT * FROM [users] ORDER BY [username]');

	$users = [];
	foreach ($data as $row) {
		$users[] = [
			'id' => $row->id,
			'username' => $row->username,
			'password' => $row->password,
		];
	}

	return $users;
}


function saveUserCredentials(Nextras\Dbal\Connection $dbConnection, string $username, string $password): bool
{
	$dbConnection->query('INSERT INTO [users] %values', [
		'username' => $username,
		'password' => password_hash($password, PASSWORD_DEFAULT),
	]);

	return true;
}


function deleteUserCredentials(Nextras\Dbal\Connection $dbConnection, int $id): bool
{
	$dbConnection->query('DELETE FROM [users] WHERE [id] = %i', $id);

	return true;
}

