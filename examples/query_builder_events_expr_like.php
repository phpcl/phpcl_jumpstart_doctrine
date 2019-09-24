<?php
// uses query builder to produce info on events where the title contains a string
$entityManager = require_once __DIR__ . '/../config/bootstrap.php';

use Application\Entity\Events;

// construct query
$qb = $entityManager->createQueryBuilder();
$qb->select(['e'])
   ->from(Events::class, 'e')
   ->orderBy('e.eventName')
   ->where($qb->expr()->like('e.eventName', "'%Benefit%'"));

// display SQL to be generated
echo $qb . PHP_EOL;

// run query
$query = $qb->getQuery();
foreach ($query->getResult() as $item) {
    echo $item->display();
}
echo PHP_EOL;
