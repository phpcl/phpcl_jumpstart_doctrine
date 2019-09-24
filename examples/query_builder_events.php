<?php
// uses query builder to produce a list of events scheduled after a specific date
$entityManager = require_once __DIR__ . '/../config/bootstrap.php';

use Application\Entity\Events;

// construct query
$qb = $entityManager->createQueryBuilder();
$qb->select(['e'])
   ->from(Events::class, 'e')
   ->orderBy('e.eventDate')
   ->where($qb->expr()->gte('e.eventDate', '?1'));

// display SQL to be generated
echo $qb . PHP_EOL;

// run query
$qb->setParameters([1 => '2021-01-01']);
$query = $qb->getQuery();
foreach ($query->getResult() as $item) {
    echo $item->getEventDate() . "\t" . $item->getEventName() . PHP_EOL;
}
echo PHP_EOL;
