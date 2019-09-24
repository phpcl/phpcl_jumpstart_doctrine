<?php
// obtaining a query builder instance
$entityManager = require_once __DIR__ . '/../config/bootstrap.php';

use Application\Entity\Events;

// get query builder instance from the EntityManager
$qb = $entityManager->createQueryBuilder();
$qb->select(['e'])
   ->from(Events::class, 'e');

// display SQL to be generated
echo $qb . PHP_EOL;

// run query
$query = $qb->getQuery();
foreach ($query->getResult() as $item) {
    echo "\n----------------------------------------";
    echo "\n" . $item->getEventName();
    echo "\n----------------------------------------\n";
    echo $item->display();
}
echo PHP_EOL;
