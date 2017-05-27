<?php


/**
 * @method User[]|\Nextras\Orm\Collection\ICollection findAll()
 */
class UsersRepository extends \Nextras\Orm\Repository\Repository
{
	public static function getEntityClassNames(): array
	{
		return [User::class];
	}


	public function findWithAtLeast2Addresses(): \Nextras\Orm\Collection\ICollection
	{
		return $this->mapper->findWithAtLeast2Addresses2();
	}
}
