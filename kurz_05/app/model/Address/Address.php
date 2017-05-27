<?php

use Nextras\Orm\Entity\Entity;


/**
 * @property int    $id {primary}
 * @property string $address
 * @property User   $user {m:1 User::$addresses}
 */
class Address extends Entity
{
}
