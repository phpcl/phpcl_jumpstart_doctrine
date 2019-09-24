<?php
// uses query builder to display a single event
$entityManager = require_once __DIR__ . '/../config/bootstrap.php';

use Application\Entity\Events;

$eventKey = 'FLO-RES-YR-406';

// construct query
try {

    // create SELECT query
    $qb = $entityManager->createQueryBuilder();
    $qb->select('e')
       ->from(Events::class, 'e')
       ->where('e.eventKey = :key');

    // display SQL to be generated
    echo $qb . PHP_EOL;

    // run query
    $qb->setParameters([':key' => $eventKey]);
    $select = $qb->getQuery();
    foreach ($select->getResult() as $event) echo $event->display();


} catch (Throwable $t) {
    echo $t->getMessage() . PHP_EOL;
    echo $t->getTraceAsString() . PHP_EOL;
}
echo PHP_EOL;
