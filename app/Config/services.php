<?php

/**
 * The FactoryDefault Dependency Injector automatically register the right services providing a full stack framework
 */
$di = new \Phalcon\DI\FactoryDefault();


/**
 * Router
 */
$di->set('router', function () {
    return include __DIR__."/router.php";
});

/**
 * The URL component is used to generate all kind of urls in the application
 */
$di->set('url', function () use ($config) {
    $url = new \Phalcon\Mvc\Url();
    $url->setBaseUri($config->application->baseUri);
    return $url;
});

/**
 * Setting up the view component
 */
$di->set('view', function () use ($config) {
    $view = new \Phalcon\Mvc\View();
    $view->setViewsDir($config->application->viewsDir);
    return $view;
});

/**
 * Database connection is created based in the parameters defined in the configuration file
 */
$di->set('db', function () use ($config) {
    return new \Phalcon\Db\Adapter\Pdo\Mysql([
        "host"     => $config->database->host,
        "username" => $config->database->username,
        "password" => $config->database->password,
        "dbname"   => $config->database->name,
    ]);
});

/**
 * Start the session the first time some component request the session service
 */
$di->set('session', function () {
    $session = new \Phalcon\Session\Adapter\Files();
    $session->start();
    return $session;
});

$di->setShared('session', function () use ($config) {
    $dir = $config->application->sessDir;
    if (! is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
    ini_set('session.gc_probability', 1);
    ini_set('session.gc_divisor', 1000);
    ini_set('session.hash_function', 'sha256');
    session_save_path($dir);
    $session = new \Phalcon\Session\Adapter\Files();
    $session->start();
    return $session;
});
