<?php
use Application\Entity\{Users,Events,Hotels};
use Doctrine\ORM\EntityRepository;

$entityManager = require_once __DIR__ . '/../config/bootstrap.php';

$factory  = $entityManager->getMetadataFactory();
$metaData = $factory->getMetadataFor(Users::class);
$repository = new EntityRepository($entityManager, $metaData);
$resMapBldr = $repository->createResultSetMappingBuilder();

$sql = "SELECT u.id, u.name, a.id AS address_id, a.street, a.city " .
       "FROM users u INNER JOIN address a ON u.address_id = a.id";

$resMapBldr->addRootEntityFromClassMetadata(Events::class, 'e');
$resMapBldr->addJoinedEntityFromClassMetadata(Hotels::class, 'h', 'e', 'hotel_id', array('id' => 'join_id'));

$query = $entityManager->createNativeQuery($sql, $resMapBldr);
$query->setParameter(1, 'romanb');
$result = $query->getResult();
var_dump($result);
