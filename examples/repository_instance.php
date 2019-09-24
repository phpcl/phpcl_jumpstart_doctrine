<?php
use Application\Entity\Users;
use Doctrine\ORM\EntityRepository;

$entityManager = require_once __DIR__ . '/../config/bootstrap.php';

$factory  = $entityManager->getMetadataFactory();
$metaData = $factory->getMetadataFor(Users::class);
$repository = new EntityRepository($entityManager, $metaData);

// this does a search by the 'id' field
$list = $repository->findBy(['partner' =>'Y']);
if ($list) {
    foreach ($list as $entity) echo $entity->getFullName() . PHP_EOL;
}
echo PHP_EOL;
