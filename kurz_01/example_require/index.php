<?php

$page = $_GET['page'] ?? 'uvod';

$allowedPages = ['uvod', 'info'];
if (!in_array($page, $allowedPages, true)) {
    echo "Nepovolena stranka";
    exit;
}

$file = __DIR__ . '/' . $page . '.php';

?>

<a href="index.php?page=uvod">uvod</a>
<a href="index.php?page=info">info</a>

<?php

require $file;
