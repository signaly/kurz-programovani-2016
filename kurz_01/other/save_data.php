<?php

$user = [
    'name' => 'hrach',
    'password' => '123',
];

$encoded = serialize($user);
$file = __DIR__ . '/data.dat';
file_put_contents($file, $encoded);
