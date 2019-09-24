<?php
// uses query builder to produce info on all events scheduled for the 1st 3 months of 2020, or have the word "Cat" in the title
$entityManager = require_once __DIR__ . '/../config/bootstrap.php';

use Application\Entity\Events;

// construct query
try {
    $qb = $entityManager->createQueryBuilder();
    $qb->select(['e'])
       ->from(Events::class, 'e')
       ->orderBy('e.eventDate')
       ->where(
            $qb->expr()->orX(
                $qb->expr()->andX(
                    $qb->expr()->gte('e.eventDate', '?1'),
                    $qb->expr()->lt('e.eventDate', '?2')
                ),
                $qb->expr()->like('e.eventName', '?3')
            )
        );

    // display SQL to be generated
    echo $qb . PHP_EOL;

    // run query
    $qb->setParameters([1 => '2020-01-01', 2 => '2020-04-01', 3 => "'%Cat%'"]);
    $query = $qb->getQuery();
    foreach ($query->getResult() as $item) {
        echo $item->display();
    }
} catch (Throwable $t) {
    echo $t->getMessage();
}
echo PHP_EOL;
