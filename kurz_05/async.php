<?php

function getAllNumbers(): array
{
	return [1, 2, 3, 4, 5, 6];
}

function getAllNumbers2(): Generator
{
	$number = 0;
	while (true) {
		yield $number++;
	}
}

$generator = getAllNumbers2();
var_dump($generator);
var_dump($generator->current());

var_dump($generator->current());
var_dump($generator->current());
