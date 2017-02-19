<?php

$user = [
	'firstname' => 'Jan',
	'surname' => 'Skrasek',
	'birthdate' => new DateTime('1990-11-19 00:00:00'),
];


function getName(array $user): string
{
	return $user['firstname'] . ' ' . $user['surname'];
}

function getAge(array $user): int
{
	return round((time() - $user['birthdate']->getTimestamp()) / (60 * 60 * 24 * 365));
}

//echo getName($user) . "\n";
//echo getAge($user) . "\n";


class Person
{
	private $firstname;
	private $surname;
	private $birthdate;

	public function __construct(string $firstname, string $secondname, DateTimeInterface $birthdate)
	{
		$this->firstname = $firstname;
		$this->surname = $secondname;
		$this->birthdate = $birthdate;
	}

	public function getName(): string
	{
		return $this->firstname . ' ' . $this->surname;
	}

	public function getAge(): int
	{
		return round((time() - $this->birthdate->getTimestamp()) / (60 * 60 * 24 * 365));
	}

	public function hasIdCard(): bool
	{
		return $this->getAge() >= 15;
	}


	public function printInfo()
	{
		echo $this->getName() . " - ";
		echo $this->hasIdCard() ? "ma obcanku" : "nema obcanku";
		echo " narozen: " . $this->birthdate->format('j. n. Y');
		echo "\n";
	}
}

$users = [];
$users[] = new Person($user['firstname'], $user['surname'], $user['birthdate']);
$users[] = new Person('Jana', 'Skraskova', new DateTime('1980-11-19 00:00:00'));
$users[] = new Person('Pepa', 'Koupy', new DateTime('2002-01-19 00:00:00'));

foreach ($users as $user) {
	$user->printInfo();
}

////////////////////////////////////////////////////////////////////////////////////////////////////





abstract class Car
{
	private $wheelNumber;

	private $position = 0;


	public function __construct(int $wheelNumber)
	{
		$this->wheelNumber = $wheelNumber;
	}


	public function getWheelNumber()
	{
		return $this->wheelNumber;
	}


	public function move()
	{
		$this->position += $this->getSpeed();
	}


	public function printPosition()
	{
		echo $this->position;
	}


	abstract protected function getSpeed();
}

class AudiA8 extends Car
{
	public function __construct()
	{
		parent::__construct(4);
	}


	protected function getSpeed()
	{
		return 3;
	}
}

class SkodaFabia extends Car
{
	public function __construct()
	{
		parent::__construct(4);
	}


	public function getName(): string
	{
		return 'Skoda Fabia';
	}


	protected function getSpeed()
	{
		return 1;
	}
}

$skoda = new SkodaFabia();
echo $skoda->getWheelNumber();
echo $skoda->getName();
$skoda->move();
$skoda->printPosition();

$audi = new AudiA8();
$audi->move();
$audi->printPosition();


function posunAuto(Car $auto)
{
	$auto->move();
}

posunAuto($skoda);
posunAuto($audi);



interface ICar
{
	public function move();
	public function getMaxSpeed(): int;
}

class SkodaOctavia implements ICar
{
	public function move()
	{

	}
	public function getMaxSpeed(): int
	{
	}
}


function posunAuto2(ICar $car)
{
}


interface IDataHolder
{
	public function getUser(int $id): array;
	public function deleteUser(int $id);
}


function zobrazUser(IDataHolder $dataHolder, $id)
{
	$user = $dataHolder->getUser($id);
	var_dump($user);
	//echo $user['user'];
}

class FileDataHolder implements IDataHolder
{
	public function getUser(int $id): array
	{
		//$users = unserialize(file_get_contents(__DIR__ . '/data.dat'));
		//return $users[$id];
		return [1];
	}


	public function deleteUser(int $id)
	{
		$users = unserialize(file_get_contents(__DIR__ . '/data.dat'));
		unset($users[$id]);
		file_put_contents(__DIR__ . '/data.dat', serialize($users));
	}
}

class SqlDataHolder implements IDataHolder
{
	private $connection;


	public function __construct(\Nextras\Dbal\Connection $connection)
	{
		$this->connection = $connection;
	}


	public function getUser(int $id): array
	{
		//$row = $this->connection->query('select * from users where id = %i', $id)->fetch();
		//return $row->toArray();
		return [2];
	}


	public function deleteUser(int $id)
	{
		$this->connection->query('delete from users where id = %i', $id);
	}

	public function sayHello()
	{
		echo "Hello!!!";
	}
}

$dataHolder = new FileDataHolder();
// $dataHolder = new SqlDataHolder();
zobrazUser($dataHolder, 1);
