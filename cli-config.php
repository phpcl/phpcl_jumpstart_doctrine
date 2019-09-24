<?php
use Doctrine\ORM\Tools\Console\ConsoleRunner;

// retrieve EntityManager
$entityManager = require_once __DIR__ . '/config/bootstrap.php';
return ConsoleRunner::createHelperSet($entityManager);
