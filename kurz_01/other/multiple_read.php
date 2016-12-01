<?php

$entries = [
    [
        "name" => "jan",
        "age" => 23,
        'children' => ["lucie"]
    ],
    [
        "name" => "peter", 
        "age" => 25,
        "children" => ["marek", "matouš"],
    ],
    [
        "name" => "monika", 
        "age" => 12,
        "children" => [],
    ],
];

$entries[] = [
    'name' => 'joshua',
    'age' => 90,
    "children" => []
];

//foreach ($entries as $row) {
//   echo $row['name'] . ': ' . $row['age'] . ' + deti: ';
//   foreach ($row['children'] as $child) {
//        echo $child . ", ";
//   }
//   echo  "\n";
//}

function has_children(array $entries, string $name): bool
{
    foreach ($entries as $row) {
        if ($row['name'] === $name) {
            return count($row['children']) > 0;
        }
    }

    return false;
}

var_dump(has_children($entries, "joshua"));
var_dump(has_children($entries, "peter"));
var_dump(has_children($entries, "monika"));
var_dump(has_children($entries, "jan"));
var_dump(has_children($entries, "nikdo"));
