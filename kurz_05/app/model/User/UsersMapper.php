<?php

class UsersMapper extends \Nextras\Orm\Mapper\Dbal\DbalMapper
{
	public function findWithAtLeast2Addresses()
	{
		$result = $this->connection->query('
			SELECT u.* FROM users u
			LEFT JOIN [addresses] a ON (u.id = a.user_id)
			GROUP BY u.id 
			HAVING count(a.id) >= 0
		');

		return $this->toCollection($result);
	}


	public function findWithAtLeast2Addresses2()
	{
		$builder = $this->builder();
		$builder->select('users.*');
		$builder->leftJoin('users', 'addresses', 'a', 'users.id = a.user_id');
		$builder->groupBy('users.id');
		$builder->having('count(a.id) > 0');
		return $this->toCollection($builder);
	}
}
