<?php

require_once __DIR__ . '/../vendor/autoload.php';

$configurator = new \Nette\Configurator();
$configurator->enableTracy(__DIR__ . '/../log');
$configurator->setTempDirectory(__DIR__ . '/../temp');
$configurator->addConfig(__DIR__ . '/config/config.neon');
$configurator->createRobotLoader()->addDirectory(__DIR__)->register();

$container = $configurator->createContainer();
return $container;
