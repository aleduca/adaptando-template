<?php

function load(array $data)
{
    $inc = $_GET['inc'] ?? 'home';

    $path = BASE.'/app/views/'.$inc.'.php';

    if (!file_exists($path)) {
        (ENVIRONMENT === 'development')?
            var_dump("View {$inc} does not exist"):
            require BASE.'/app/views/404.php';
    } else {
        extract($data);
        require $path;
    }
}
