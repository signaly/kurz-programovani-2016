<?php

interface IPerson
{
	public function getName();
}

class Person implements IPerson
{
	private $name;
	public function __construct(string $name)
	{
		$this->name = $name;
	}
	public function getName()
	{
		return $this->name;
	}
}

class Teacher extends Person
{
	public function getDegree()
	{
		return 'Mgr.';
	}
}


class ClassRoom
{
	private $teacher;
	private $students;
	public function __construct(Teacher $teacher)
	{
		$this->teacher = $teacher;
	}
	public function addStudent(IPerson $student)
	{
		$this->students[] = $student;
	}
	public function getTeacher(): Teacher
	{
		return $this->teacher;
	}
	public function getTeacherName(): string
	{
		return $this->teacher->getName();
	}
	/**
	 * @return IPerson[]
	 */
	public function getStudents(): array
	{
		return $this->students;
	}
}

$teacher = new Teacher('Jan Skrasek');
$classroom = new ClassRoom($teacher);
$classroom->getTeacher()->getDegree();

$student1 = new Person('Pepa');
$student2 = new Person('Matous');
$classroom->addStudent($student1);
$classroom->addStudent($student2);
$classroom->addStudent($teacher);

foreach ($classroom->getStudents() as $student) {
	echo $student->getName();
}
