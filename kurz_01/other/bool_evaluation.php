<?php

var_dump((string) "1");
var_dump((int) "1");

var_dump((bool) "1");
var_dump((bool) 1);
var_dump((bool) "ahoj");

var_dump((bool) "0");
var_dump((bool) 0);
var_dump((bool) "");

var_dump((bool) []);
var_dump((bool) [1]);


var_dump(1 == "1"); 
var_dump(1 == "1a");
var_dump(1 == "a1");
var_dump(1 == "1 ");
var_dump(1 == " 1");
var_dump(" 1" + 3);

var_dump(1 === "1");



var_dump(1 != "1");
var_dump(1 !== "1");

var_dump(81 == "81");
var_dump(81 == "071");

var_dump([] === []);
var_dump([1, 2] == [2, 1]);