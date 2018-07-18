<?php

namespace App\Controllers;
use Dotenv\Dotenv;

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
        // Set error reporting level
        // @todo: make this dynamic
        error_reporting(E_ALL);

        // Set the location of the config file
        $dotenv = new Dotenv('./');
        // Set required fields
        //$dotenv->required('DB_HOST');
        //$dotenv->required('DB_PORT')->isInteger();
        //$dotenv->required(['DB_HOST', 'DB_DATABASE', 'DB_USERNAME', 'DB_PASSWORD']);
        // Load settings
        $dotenv->load();
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