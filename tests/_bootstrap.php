<?php

$autoloader = realpath(
    __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'vendor'.
    DIRECTORY_SEPARATOR.'autoload.php'
);

/** @noinspection PhpIncludeInspection */
require_once $autoloader;
require_once 'Config/config.php';
require_once 'Config/services.php';
