<?php

$array = [];
$array[] = 1;
$array[] = 2;
$array[] = "jan";

var_dump($array);

$array = [];
$array[2] = "jan";
var_dump($array);

$array = [];
$array["name"] = "jan";
$array["age"] = 23;
$array["surname"] = null;

$array = [
    'name' => 'jan',
    'age' => 26,
    "surname" => null
];

var_dump($array);

var_dump(isset($foo));
var_dump(isset($array['name']));
var_dump(isset($array['surname']));
var_dump(isset($array['blbost']));

if (isset($array['surname'])) {
    $surname = $array['surname'];
} else {
    $surname = 'nenastaveno';
}

$surname = $array['surname'] ? $array['surname'] : 'nenastaveno';
$surname = $array['surname'] ?: 'nenastaveno';
$surname = isset($array['surname']) ? $array['surname'] : 'nenastaveno';
$surname = $array['surname'] ?? 'nenastaveno';

foreach ($array as $value) {
     echo $value . "\n";
}

foreach ($array as $key => $value) {
     echo $key . ": " . $value . "\n";
}

$array = [
    'name' => 'jan',
    'age' => 26,
    'surname' => null
];

