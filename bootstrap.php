<?php

require __DIR__.'/vendor/autoload.php';

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$paths = [
    "src",
];
$isDevMode = true;

// the connection configuration
$dbParams = require __DIR__.'/config/config.php';
//Lire les annotations et les analyser.
$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
//Recupération d'un manager pour gérer( modification, suppression,etc...)
return EntityManager::create($dbParams, $config);
