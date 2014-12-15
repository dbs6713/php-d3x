<?php

require 'Config/autoloader.php';
require 'Config/config.php';

$autoloader = new Autoloader($config['application']['classes']);
$autoloader->register();
