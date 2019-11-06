<?php
// this examples demonstrates the use of the repo "get" methods
use Application\Entity\Users;
use Doctrine\ORM\EntityRepository;

$entityManager = require_once __DIR__ . '/../config/bootstrap.php';

$factory  = $entityManager->getMetadataFactory();
$metaData = $factory->getMetadataFor(Users::class);
$repository = new EntityRepository($entityManager, $metaData);

echo "\nClass: " . $repository->getClassName();
