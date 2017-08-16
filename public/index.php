<?php

use Composer\Autoload\ClassLoader;

error_reporting(E_ALL);

try {
    
    /** @var ClassLoader $loader */
    $vendorLoader = require __DIR__.'/../vendor/autoload.php';
    
    /**
     * Read the configuration
     */
    $config = require __DIR__."/../app/Config/config.php";
    
    /**
     * Include loader
     */
    require __DIR__.'/../app/Config/loader.php';
    
    /**
     * Include services
     */
    require __DIR__.'/../app/Config/services.php';
    
    $di->set('config', $config);
    
    /**
     * Handle the request
     */
    $application = new \Phalcon\Mvc\Application();
    $application->setDI($di);
    echo $application->handle()->getContent();
    
} catch (Phalcon\Exception $e) {
    echo $e->getMessage();
} catch (PDOException $e) {
    echo $e->getMessage();
}
