<?php
// uses query builder to displays hotels holding events
$entityManager = require_once __DIR__ . '/../config/bootstrap.php';

use Application\Entity\Events;

// construct query
try {

    // create SELECT query
    $qb = $entityManager->createQueryBuilder();
    $qb->select('e')
       ->from(Events::class, 'e')
       ->orderBy('e.eventName');

    // run query
    $select = $qb->getQuery();
    echo "--------------------------------------------------\n";
    printf("%35s | %s\n", 'EVENT', 'HOTEL');
    echo "--------------------------------------------------\n";
    foreach ($select->getResult() as $event) {
        $eventName = $event->getEventName();
        $hotelName = $event->getHotel()->getHotelName();
        printf("%35s | %s\n", $eventName, $hotelName);
    }



} catch (Throwable $t) {
    echo $t->getMessage() . PHP_EOL;
    echo $t->getTraceAsString() . PHP_EOL;
}
echo PHP_EOL;
