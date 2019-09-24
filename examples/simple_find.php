<?php
use Application\Entity\Users;

$entityManager = require_once __DIR__ . '/../config/bootstrap.php';

// this does a search by the 'id' field
$user = $entityManager->find(Users::class, 100);
var_dump($user);
echo PHP_EOL;
