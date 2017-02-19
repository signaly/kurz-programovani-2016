<?php

require_once __DIR__ . '/vendor/autoload.php';

$form = new Nette\Forms\Form();
$form->addText('username', 'Uživatelské jméno')
	->addRule($form::FILLED, 'Musíš vyplnit uživatelské jméno!!!');

$ageInput = $form->addText('age', 'Věk');
$ageInput
	->addCondition($form::FILLED)
	->addRule($form::INTEGER);
// $ageInput->setDefaultValue(10);
$ageInput->getControlPrototype()->setAttribute('placeholder', 'Napiš svůj věk');

$form->addEmail('email', 'E-mail');
$form->addSubmit('send', 'Registrovat');

$form->setRenderer(new \Nextras\Forms\Rendering\Bs3FormRenderer());

$form->setDefaults([
	'username' => 'Jan',
]);

if ($form->isSuccess()) {
	$values = $form->getValues();
	dump($values);
	exit;
}


?>

<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script src="https://rawgit.com/nette/forms/master/src/assets/netteForms.js"></script>
</head>
<body>
<div class="container">
<div class="row">
	<div class="col-sm-6">
		<?php $form->render(); ?>
	</div>
</div>
</div>
</body>
</html>
