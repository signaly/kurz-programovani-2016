<?php

$container = require_once __DIR__ . '/../app/bootstrap.php';

$application = $container->getByType(Nette\Application\Application::class);
$application->run();
