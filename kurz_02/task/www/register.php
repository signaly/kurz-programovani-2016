<?php

require_once __DIR__ .'/../config.php';
require_once __DIR__ .'/../functions.php';

$pageTitle = 'Registrace > Nový uživatel';

require_once __DIR__ .'/../head.php';

function printLoginForm()
{
?>

    <div class="container">

      <form class="form-signin" method=post>
        <h2 class="form-signin-heading">Registrujte se <span class="label label-default">New</span></h2>

        <input type="username" name="username" id="inputUsername" class="form-control" placeholder="Jméno" value="<?php echo $_POST['username'] ?? ''; ?>" required autofocus>

        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Heslo" required>

        <input type="password" name="password_repeat" id="inputPasswordRepeat" class="form-control" placeholder="Heslo znovu" required>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Registrovat</button>
      </form>

    </div>

<!--
	<form method=post>
	Jméno: <input type=text name=username value="<?php echo $_POST['username'] ?? ''; ?>"><br>
	Heslo: <input type=password name=password><br>
	Heslo (znovu): <input type=password name=password_repeat><br>
	<input type=submit value="Přihlásit se">
	</form>
-->
<?php
}

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['password_repeat'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$passwordRepeat = $_POST['password_repeat'];

	if (strlen($username) < MIN_USERNAME_LENGTH) {
		echo '<div class="alert alert-warning" role="alert">Příliš krátké uživatelské jméno, zadejte alespoň ' . MIN_USERNAME_LENGTH . ' znaky.</div>';
	} else if (preg_match('/^[a-zA-Z]+$/', $username) === 0) {
		echo "V uživatelském jméně mohou být pouze malá a velká písmena.";
	} else if (strlen($password) < MIN_PASSWORD_LENGTH) {
		echo "Příliš krátké heslo, zadejte alespoň " . MIN_PASSWORD_LENGTH . " znaků.";
	} else if ($passwordRepeat !== $password) {
		echo "Hesla nejsou stejná!";
	} else {
		if (saveUserCredentials($dbConnection, $username, $password)) {
			echo "Jméno a heslo bylo správně uloženo.";
		} else {
			echo "Nepodařilo se uložit jméno a heslo!";
		}
	}
}

printLoginForm();

require_once __DIR__ .'/../footer.php';
