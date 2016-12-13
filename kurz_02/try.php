<?php

var_dump(file_get_contents('test.txt'));

$test = ['info', 'uvod'];

switch ($test) {
	case ['info', 'uvod']:
		echo 'uvod2';
		break;

	case 'info':
		echo 'info1';
		break;

	default:
		echo 'Nepovolena stranka';
		break;
}

$mystring = 'abc';
$findme   = 'b';
$pos = strpos($mystring, $findme);
var_dump($pos);

if (strpos($mystring, $findme)) {
	echo 'nenasel jsem';
} else {
	echo 'nasel jsem';
}

var_dump(strpos('abc', 'a'));

$heslo = 'ahoj';
$salt = 'Uw@e4Tho8Uhue7ieg7TeizaSh"aiga';
var_dump(md5($heslo . $salt));
var_dump(md5($heslo . 'a'));

var_dump($heslo);
$hash = password_hash($heslo, PASSWORD_DEFAULT);
if ($hash === false) {
	echo 'chyba v sifrovani';
}
var_dump($hash);
if (password_verify($heslo . 'x', $hash)) {
	echo 'spravne';
} else {
	echo 'spatne';
}
