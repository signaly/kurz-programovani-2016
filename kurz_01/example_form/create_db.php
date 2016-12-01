<?php

$data = [
	['username' => 'hrach', 'password' => 'heslo'],
	['username' => 'test', 'password' => 'test'],
];

file_put_contents(__DIR__ . '/data.dat', serialize($data));