<?php

use Nette\Application\Routers\Route;
use Nette\Application\Routers\RouteList;


class RouterFactory
{
	public function create(): RouteList
	{
		$router = new RouteList();
		$router[] = new Route('<presenter>/<action>', 'Homepage:welcome');
		return $router;
	}
}
