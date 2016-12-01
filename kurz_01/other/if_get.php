<?php

if (isset($_POST['key']) && $_POST['key'] === 'something') {
    
}

if (($_POST['key'] ?? '') === 'something') {
    
}


$cond1 = true;
$cond2 = true;
$cond3 = true;

if ($cond1) {

} elseif ($cond2) {

} elseif ($cond3) {

} else {
    
}
