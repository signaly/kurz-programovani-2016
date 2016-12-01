<?php

// vars

$name = "asd"; // string
$name = 1; // int
$name = 2.0; // float
$name = []; // array
$name = true; // bool 
$name = false; // bool

// print 

echo $name;
echo "Name: " . $name;
echo "Name: $name";
echo 'Name: $name';
echo "Name: \$name\n";
// echo ("Name: ", $name); // not used

// conditions

$minValue = null;
if ($minValue !== null) {
    echo "Zname minimum";
} else {
    echo "Prazdny seznam";
}


$ages = [12, 23, 43];
     //  0   1   2
echo $ages[0];
echo $ages[3]; // warning

echo count($ages); // 3
$ages[0] = 23;
$ages[3] = 24;
$ages[] = 25;

// cycles

for ($i = 0; $i < 10; $i++) {
}


// aspon 1×
$i = 0;
do {
    $i++;
} while ($i < 10);


$i = 0;
while ($i < 10) {
    $i++;
}



foreach ([1, 2, 3] as $value) {
    echo $value;
}