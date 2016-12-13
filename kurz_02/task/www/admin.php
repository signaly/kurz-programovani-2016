<?php

require_once __DIR__ .'/../config.php';
require_once __DIR__ .'/../functions.php';

if (isset($_GET['delUser']) && is_numeric($_GET['delUser'])) {
	if (deleteUserCredentials($dbConnection, $_GET['delUser'])) {
		echo 'Uživatel byl smazán.<br>';
	} else {
		echo 'Nepodařilo se uživatele smazat.';
	}
}

$users = getUserCredentials($dbConnection);
foreach ($users as $row) {
	echo "Jmeno: " . htmlspecialchars($row['username']) . ' <a href="?delUser=' . $row['id'] . '">Smazat</a><br>';
	echo "Heslo: " . $row['password'] . "<br>";
	echo "<br>";
}
