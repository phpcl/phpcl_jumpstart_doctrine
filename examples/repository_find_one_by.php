<?php
use Application\Entity\Users;
use Doctrine\ORM\EntityRepository;

$entityManager = require_once __DIR__ . '/../config/bootstrap.php';

$factory  = $entityManager->getMetadataFactory();
$metaData = $factory->getMetadataFor(Users::class);
$repository = new EntityRepository($entityManager, $metaData);

// this does a search by the 'id' field
$entity = $repository->findOneBy(['email' =>'andrew.caya@etista.com']);
echo "\nClass: " . get_class($entity);
echo "\nName: " . $entity->getFullName();
echo PHP_EOL;
