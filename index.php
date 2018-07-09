<?php

require_once './vendor/autoload.php';

$loader = new Twig_Loader_Filesystem(
    array(
        __DIR__ . '/src/assets/html',
        __DIR__ . '/src/modules/dashboard/views',
    )
);

$twig = new Twig_Environment($loader, [
    'cache' => __DIR__ . '/cache/views'
]);

echo $twig->render('dashboard.twig');