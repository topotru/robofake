<?php

return new \Phalcon\Config([
    'database'    => [
        'adapter'  => 'Mysql',
        'host'     => 'localhost',
        'username' => 'root',
        'password' => '',
        'name'     => 'test',
    ],
    'application' => [
        'controllersDir' => __DIR__.'/../../app/Controllers/',
        'modelsDir'      => __DIR__.'/../../app/Models/',
        'viewsDir'       => __DIR__.'/../../app/Views/',
        'libraryDir'     => __DIR__.'/../../app/Library/',
        'cacheDir'       => __DIR__.'/../../app/Cache/',
        'sessDir'        => __DIR__.'/../../app/Cache/sess/',
        'appDir'         => __DIR__.'/../../app/',
        'vendorDir'      => __DIR__.'/../../vendor/',
        'baseUri'        => '/',
    ],
]);
