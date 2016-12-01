<?php

echo $_GET['name'] ?? 'bez jména';

if (isset($_GET['name'])) {
    echo $_GET['name'];
} else {
    echo 'bez jména';
}
