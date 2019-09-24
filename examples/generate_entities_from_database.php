<?php
use Doctrine\ORM\Tools\EntityGenerator;
use Doctrine\ORM\Mapping\Driver\DatabaseDriver;
use Doctrine\ORM\Tools\DisconnectedClassMetadataFactory;
use Doctrine\ORM\Tools\Export\Driver\AnnotationExporter;

$entityManager = require_once __DIR__ . '/../config/bootstrap.php';
$schemaManager = $entityManager->getConnection()->getSchemaManager();
$entityManager->getConfiguration()->setMetadataDriverImpl(new DatabaseDriver($schemaManager));

$cmf = new DisconnectedClassMetadataFactory();
$cmf->setEntityManager($entityManager);
$metadata = $cmf->getAllMetadata();

// NOTE: $srcPath is defined in bootstrap.php
$exporter = new AnnotationExporter($srcPath[0]);
$exporter->setMetadata($metadata);
$exporter->setEntityGenerator(new EntityGenerator());
$exporter->export();