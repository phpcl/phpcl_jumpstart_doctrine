<?php
// bootstrap.php
require_once __DIR__ . '/../vendor/autoload.php';
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\Common\Cache\ArrayCache;

// Create a simple "default" Doctrine ORM configuration for Annotations
$srcPath   = [realpath(__DIR__ . '/../src/Application/Entity')];
$isDevMode = true;
$autoProxy = ($isDevMode) ? TRUE : FALSE;
$cache     = new ArrayCache();
$config    = Setup::createAnnotationMetadataConfiguration($srcPath, $isDevMode, NULL, NULL, FALSE);
$config->setMetadataCacheImpl($cache);
$config->setQueryCacheImpl($cache);
$config->setProxyDir(realpath(__DIR__ . '/../data/proxy'));
// for production this is generally turned off
$config->setAutoGenerateProxyClasses($autoProxy);

// database configuration parameters
$conn = [
    'driver'   => 'pdo_mysql',
    'host'     => 'localhost',
    'dbname'   => 'jumpstart',
    'user'     => 'test',
    'password' => 'password'
];

// obtaining the entity manager
return EntityManager::create($conn, $config);