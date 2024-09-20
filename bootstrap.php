<?php

use \Core\Container;
use \Core\Database;
use \Core\App;



$container = new Container();

App::setContainer($container);

App::bind('Core\Database', function () {

    require basePath("DbCredentials.php");

    $config = require basePath('config.php');

    $credentials = new DbCredentials(__DIR__);

    $username = $credentials->username;

    $password = $credentials->password;

    return new Database($config, $username, $password);
});
