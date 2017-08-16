<?php
/**
 * Created by PhpStorm.
 * User: topot
 * Date: 16.08.2017
 * Time: 20:11
 */

use Phalcon\Mvc\Router;

$router = new Router(false);
$router->removeExtraSlashes(true);
$router->setUriSource(Router::URI_SOURCE_SERVER_REQUEST_URI);

$router->addGet("/", [
    'controller' => 'index',
    'action'     => 'index',
])->setName("index");

$router->addGet("/pay", [
    'controller' => 'index',
    'action'     => 'pay',
])->setName("pay");

return $router;
