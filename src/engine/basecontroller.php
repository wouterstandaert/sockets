<?php

namespace App\Controllers;

class BaseController
{
    private $module;


    private $view;


    /**
     * The main constructor
     */
    public function __construct()
    {
        $this->loadSettings();
    }


    /**
     * Load basic settings
     */
    private function loadSettings()
    {
        var_dump("Load settings");
        // @todo: fix getenv
    }


    /**
     * Load the template engine
     */
    public function loadTemplateEngine()
    {
        // Load template directories
        $loader = new Twig_Loader_Filesystem(
            array(
                __DIR__ . '/src/assets/templates',
                __DIR__ . '/src/modules/' . $this->getModule() . '/views',
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
    }


    /**
     * Set the active module
     *
     * @param string $module The current module
     */
    public function setModule($module)
    {
        $this->module = $module;
    }


    /**
     * Get the active module
     *
     * @return string
     */
    public function getModule()
    {
        return $this->module;
    }
}