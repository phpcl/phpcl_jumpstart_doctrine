<?php
// uses query builder to update the time of an event
$entityManager = require_once __DIR__ . '/../config/bootstrap.php';

use Application\Entity\Events;

$eventId = 152;

// construct query
try {

    // display current event
    $event = $entityManager->find(Events::class, $eventId);
    echo "\nNEW DATE: \n";
    echo $event->display();

    // create random date
    $randDate = sprintf('2020-%02d-%02d %02d:%02d:00', rand(1,12), rand(1,9), rand(8,22), rand(0,59));
    $newDate  = new DateTime($randDate);

    // create UPDATE query
    $qbUpdate = $entityManager->createQueryBuilder();
    $qbUpdate->update(Events::class, 'e')
            ->set('e.eventDate', ':date')
            ->where('e.id = :id');
    $qbUpdate->setParameters([':date' => $newDate, ':id' => $eventId]);
    $qbUpdate->getQuery()->execute();

    // NOTE: this is needed to force the entity manager to reload the entity into memory
    $entityManager->clear();

    // redisplay updated event
    $event = $entityManager->find(Events::class, $eventId);
    echo "\nNEW DATE: \n";
    echo $event->display();

} catch (Throwable $t) {
    echo $t->getMessage() . PHP_EOL;
    echo $t->getTraceAsString() . PHP_EOL;
}
echo PHP_EOL;
