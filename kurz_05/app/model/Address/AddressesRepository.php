<?php

class AddressesRepository extends \Nextras\Orm\Repository\Repository
{
	public static function getEntityClassNames(): array
	{
		return [Address::class];
	}
}
