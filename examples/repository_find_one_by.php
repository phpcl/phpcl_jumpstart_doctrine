<?php
use Application\Entity\Users;
use Doctrine\ORM\EntityRepository;

$entityManager = require_once __DIR__ . '/../config/bootstrap.php';

$factory  = $entityManager->getMetadataFactory();
$metaData = $factory->getMetadataFor(Users::class);
$repository = new EntityRepository($entityManager, $metaData);

// this does a search by the 'id' field
$entity = $repository->findOneBy(['email' =>'cstrickl234@optus.com']);
var_dump($entity);
echo PHP_EOL;
