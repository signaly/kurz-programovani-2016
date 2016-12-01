<?php

function isUserLoggedIn(string $username, string $password): bool
{
	$data = unserialize(file_get_contents(__DIR__ . '/data.dat'));
	foreach ($data as $row) {
		if ($row['username'] === $username && $row['password'] === $password) {
			return true;
		}
	}
	return false;
}


function printLoginForm()
{
?>
    <form method=post>
    Jméno: <input type=text name=username value="<?php echo $_POST['username'] ?? ''; ?>">
    Heslo: <input type=password name=password>
    <input type=submit value="Přihlásit se">
    </form>
<?php	
}





if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (isUserLoggedIn($username, $password) === true) {
        header('Location: http://localhost/kurz_01/example_form/form_after.php?name=' . $username);
        exit;
    } else {
        echo "Špatné uživatelské jméno nebo heslo";
		printLoginForm();
    }
} else {
	printLoginForm();
}
