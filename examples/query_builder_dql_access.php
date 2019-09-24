<?php
// uses query builder to display a single event
$entityManager = require_once __DIR__ . '/../config/bootstrap.php';
use Application\Entity\Events;
$eventKey = 'GRE-PRO-LL-667';

// construct query
try {

    // create SELECT query
    $qb = $entityManager->createQueryBuilder();
    $qb->select('e')
       ->from(Events::class, 'e')
       ->where('e.eventKey = :key');

    // get DQL
    echo $qb->getDQL();

} catch (Throwable $t) {
    echo $t->getMessage() . PHP_EOL;
    echo $t->getTraceAsString() . PHP_EOL;
}
echo PHP_EOL;

// output:
// SELECT e FROM Application\Entity\Events e WHERE e.eventKey = :key
