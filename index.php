<?php

require_once './vendor/autoload.php';

// Load template directories
$loader = new Twig_Loader_Filesystem(
    array(
        __DIR__ . '/src/assets/templates',
        __DIR__ . '/src/modules/dashboard/views',
    )
);

// Instantiate a new twig environment with some default settings
$twig = new Twig_Environment($loader, [
    //'cache' => __DIR__ . '/cache/views',
    'debug' => true
]);

// Enable debug mode
$twig->addExtension(new Twig_Extension_Debug());

// Render the main template
$layout = $twig->render('layout.twig');

// Render the page template
echo $twig->render('dashboard.twig', array('Content' > $layout));