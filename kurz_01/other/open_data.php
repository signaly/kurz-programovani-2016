<?php

$file = __DIR__ . '/data.dat';
$data = file_get_contents($file);
$data = unserialize($data);

echo "Ahoj " . $data['name'] . "\n";
