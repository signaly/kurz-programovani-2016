<?php

use Nextras\Orm\Collection\ICollection;
use Nextras\Orm\Entity\Entity;
use Nextras\Orm\Relationships\OneHasMany;


/**
 * @property int                  $id {primary}
 * @property string               $username
 * @property string               $password
 * @property string               $email
 * @property Address[]|OneHasMany $addresses {1:m Address::$user, cascade=[persist, remove]}
 *
 * @property-read Address[]|ICollection $limitedAddresses
 */
class User extends Entity
{
	protected function getterLimitedAddresses()
	{
		return $this->addresses->get()->limitBy(2);
	}
}
