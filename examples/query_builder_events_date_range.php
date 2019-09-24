<?php
// uses query builder to produce a list of events scheduled within a range of dates
$entityManager = require_once __DIR__ . '/../config/bootstrap.php';

use Application\Entity\Events;

// construct query
$qb = $entityManager->createQueryBuilder();
$qb->select(['e'])
   ->from(Events::class, 'e')
   ->orderBy('e.eventDate')
   ->where($qb->expr()->andX(
        $qb->expr()->gte('e.eventDate', '?1'),
        $qb->expr()->lt('e.eventDate', '?2')
    ));

// display SQL to be generated
echo $qb . PHP_EOL;

// run query
$qb->setParameters([1 => '2021-01-01', 2 => '2021-06-01']);
$query = $qb->getQuery();
$name = '';
foreach ($query->getResult() as $item) {
    echo $item->getEventDate() . "\t" . $item->getEventName() . PHP_EOL;
}
echo PHP_EOL;
